<?php
// Admin preview: renders the real Kodakil CMS admin views with fictional demo data — no database needed.
// Usage (from the repository root, with a licensed Metronic copy in ./theme):
//   php -d short_open_tag=On -S localhost:8086 tools/admin-preview/router.php
//   → /?v=home | products | products_add | slider | catalog_list | dealership_form
error_reporting(E_ERROR | E_PARSE);
define('BASEPATH', __DIR__);
define('ROOT', dirname(__DIR__, 2));
define('APP', ROOT . '/application');

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (strpos($path, '/assets/uploads/') === 0) {          // uploaded media is not in the repo: serve a neutral placeholder
    header('Content-Type: image/svg+xml');
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="400" height="300"><rect width="100%" height="100%" fill="#e9edf3"/><path d="M150 190l40-50 30 35 20-20 40 35z" fill="#c3ccd9"/><circle cx="235" cy="120" r="14" fill="#c3ccd9"/></svg>';
    return true;
}
if ($path !== '/' && is_file(ROOT . $path)) return false;

function base_url($p = '') { return '/' . ltrim($p, '/'); }
function site_url($p = '') { return '/' . ltrim($p, '/'); }
function admin_url($p = '') { return '/?v=' . urlencode(strtolower(ltrim($p, '/'))); }
function current_url() { return $_SERVER['REQUEST_URI']; }
require ROOT . '/helpers/kodakil_helper.php';

class Stub { function __call($n, $a) { return null; } function __get($n) { return new Stub; } function __toString() { return ''; } }
class Session { function flashdata($k) { return null; } function userdata($k) { return ['name' => 'Demo', 'surname' => 'Admin', 'lang' => 1][$k] ?? 'Demo'; } }
class Harness {
    public $session, $agent, $input, $db, $uri, $config;
    function __construct() { $this->session = new Session; $this->agent = $this->input = $this->db = $this->uri = $this->config = new Stub; }
    function view($name, $data = []) { extract((array) $data); include APP . "/views/$name.php"; }
}

$o = fn(array $a) => (object) $a;
$v = preg_replace('/[^a-z_]/', '', strtolower($_GET['v'] ?? 'home')) ?: 'home';
$header = $o(['mainMenu' => 'Home', 'subMenu' => '']);
$d = new stdClass;
switch ($v) {
    case 'products':
        $header = $o(['mainMenu' => 'Products', 'subMenu' => 'ProductsList']);
        $names = ['Fren Balatası Ön Takım', 'Yağ Filtresi', 'Hava Filtresi', 'Amortisör', 'Debriyaj Seti', 'Triger Seti', 'Polen Filtresi', 'Buji Seti'];
        $d->productInfo = array_map(fn($i) => $o(['Id' => $i + 1, 'product_name' => $names[$i], 'category_title' => ['Fren', 'Filtre', 'Filtre', 'Süspansiyon', 'Şanzıman', 'Motor', 'Filtre', 'Ateşleme'][$i], 'lang_name' => $i % 3 ? 'Türkçe' : 'English', 'product_image' => "p$i.jpg", 'status' => $i % 4 ? 1 : 0]), range(0, 7));
        break;
    case 'products_add':
        $header = $o(['mainMenu' => 'Products', 'subMenu' => 'ProductsAdd']);
        $d->category_list = array_map(fn($n, $i) => $o(['Id' => $i + 1, 'name' => $n]), ['Fren', 'Filtre', 'Motor', 'Süspansiyon'], range(0, 3));
        $d->languages_list = [$o(['Id' => 1, 'lang_name' => 'Türkçe']), $o(['Id' => 2, 'lang_name' => 'English'])];
        break;
    case 'slider':
        $header = $o(['mainMenu' => 'Slider', 'subMenu' => 'SliderList']);
        $d->getSliders = array_map(fn($i) => $o(['Id' => $i + 1, 'picture_info' => "slide-$i.jpg", 'sort' => $i + 1, 'status' => 1]), range(0, 4));
        break;
    case 'catalog_list':
        $header = $o(['mainMenu' => 'Catalog', 'subMenu' => 'CatalogList']);
        $d->catalog = array_map(fn($t, $i) => $o(['Id' => $i + 1, 'title' => $t, 'image' => "c$i.jpg", 'status' => 1]), ['Ford Yedek Parça Kataloğu', 'Filtre Kataloğu 2017', 'Fren Sistemleri', 'Aksesuar Kataloğu'], range(0, 3));
        break;
    case 'dealership_form':
        $header = $o(['mainMenu' => 'Form', 'subMenu' => 'Dealership']);
        $firms = ['Örnek Otomotiv Ltd.', 'Demo Yedek Parça', 'Karadeniz Oto', 'Anadolu Parça A.Ş.'];
        $d->forms = array_map(fn($f, $i) => $o(['id' => $i + 1, 'firma_adi' => $f, 'unvan' => $f, 'yetkili_adi' => ['Ali Demo', 'Ece Örnek', 'Can Test', 'Deniz Demo'][$i], 'telefon' => '0555 000 00 00', 'eposta' => 'demo@example.com', 'CityName' => ['Samsun', 'Ankara', 'Trabzon', 'İzmir'][$i], 'CountyName' => ['Atakum', 'Çankaya', 'Ortahisar', 'Bornova'][$i], 'kurulus_yili' => 2005 + $i, 'mesaj' => 'Bayilik başvurusu hakkında bilgi almak istiyoruz.']), $firms, range(0, 3));
        break;
    default:
        $v = 'home';
        foreach (['categoryCount' => 12, 'languagesCount' => 2, 'newsCount' => 18, 'pcategoryCount' => 9, 'photoCount' => 146, 'productCount' => 84, 'sliderCount' => 6, 'staticsCount' => 212] as $k => $n) $d->$k = $n;
        $d->news = array_map(fn($t, $i) => $o(['news_title' => $t, 'news_content' => 'Kurumsal duyuru içeriği.', 'news_picture' => "n$i.jpg", 'added_time' => "2017-0" . ($i + 3) . "-1$i 10:00:00"]), ['Yeni şubemiz açıldı', 'Ford yedek parça kataloğu yayında', 'Bayilik başvuruları başladı'], range(0, 2));
}

$h = new Harness;
$h->view('Admin/header', $header);
$h->view('Admin/' . $v, $d);
$h->view('Admin/footer', []);
