
<?php
$routes = [
    'GET' => ['/' => 'homehandler'],
    'POST' => ['/upload-images' => 'uploadhandler']
];

// Parse request URI and method
$path =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$handlerFunction = $routes[$method][$path] ?? 'notFoundHandler';
$handlerFunction();

//$safeHandler = function_exists($handlerFunction) ??  $handlerFunction ?? 'notFoundHandler';

// Get handler function for route, default to notFoundHandler
function notFoundHandler()
{
    http_response_code(404);
    echo render('./template/404.html');
};

// Handle GET request for homepage
function homehandler()
{

    $pdo = databaseConnect();
    $stmt = $pdo->prepare('SELECT * FROM kepek');
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $success = isset($_GET['success']);
    $error = isset($_GET['error']);

    echo render('./template/home.php', [

        'images' => $images,
        'success' => $success,
        'error' => $error

    ]);
}

// Handle POST request for uploading images
function uploadhandler()
{
 
    $imageFiles = $_FILES['files'];
    $files = transformFiles($imageFiles);
    $isErr = false;

    foreach ($files as $file) {

        $uploadSuccess = saveImages($file);

        if (!$uploadSuccess) {
            $isErr = true;
        }
    }

    header('Location: /' . ($isErr ? '?error=1' : '?success=1'));
}

// Save uploaded image to local directory and insert information into database
function saveImages(mixed $file): bool
{

    $typelist = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF,"image/jpg"];
    $type = exif_imagetype($file['tmp_name']);

    if (!in_array($type, $typelist)) {
        return false;
    };

    // Generate random file name and save image to local directory
    $randomName = uniqid(rand(), true);
    $fileType = pathinfo($file['name'], PATHINFO_EXTENSION);
    $originalFileName = $randomName . '.' . $fileType;
    $savePath = "./images/";
    $success = file_put_contents($savePath . $originalFileName, file_get_contents($file['tmp_name']));

    // Return false if image failed to save
    if (!$success) {
        return false;
    }

    $pdo = databaseConnect();
    $stmt = $pdo->prepare('INSERT INTO kepek (name,type) VALUES (?,?)');
    $stmt->execute([$randomName, $fileType]);

    return true;
}

// Transform uploaded files into array for easier processing
function transformFiles($uploadFiles)
{
    $img = [];

    for ($i = 0; $i <  count($uploadFiles['name']); $i++) {

        $img[] =
            [
                'name' => $uploadFiles['name'][$i],
                'type' => $uploadFiles['type'][$i],
                'tmp_name' => $uploadFiles['tmp_name'][$i],
                'size' => $uploadFiles['size'][$i],
                'error' => $uploadFiles['error'][$i],
            ];
    }

    return $img;
}

// Render a template file with optional parameters
function render($path, $params = [])
{
    ob_start();
    require $path;
    return ob_get_clean();
}

//Connect to database
function databaseConnect()
{
    try {
        $con = new PDO(
            'mysql:host=' . $_SERVER['DB_HOST'] . ';dbname=' . $_SERVER['DB_NAME'],
            $_SERVER['DB_USER'],
        );
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    } catch (PDOException $e) {
        echo 'Connection failed:' . $e->getMessage();
    }
}
