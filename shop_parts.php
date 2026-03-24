<?php
session_start();

require 'config/connect.php';

$message = '';

// Handle Add Part (admin only)
if (isset($_POST['add_part']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
    $name        = trim($_POST['name']        ?? '');
    $category    = trim($_POST['category']    ?? '');
    $price       = floatval($_POST['price']   ?? 0);
    $quantity    = intval($_POST['quantity']  ?? 0);
    $description = trim($_POST['description'] ?? '');

    if ($name !==''  && $category !== ''  && $price > 0) {
        try{
            $stmt = $pdo->prepare("INSERT INTO spare_parts(part_name,category,price,quantity,description) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $category, $price, $quantity, $description]);

            $message ='<div class="msg success">
             <i class="fa-solid fa-circle-check"></i> Part "' . htmlspecialchars($name) .'" added successfully!
            </div>';
        }catch(PDOException $e){
            $message ='<div class="msg error">
             <i class="fa-solid fa-circle-exclamation"></i> Error adding part:' . htmlspecialchars($e->getMessage()) .'
            </div>';
        }
    } else {
        $message = '<div class="msg error">
        <i class="fa-solid fa-circle-exclamation"></i> Please fill in all required fields(name, category, price > 0).
        </div>';
    }
}

// Fetch parts
$search   = trim($_GET['search']   ?? '');
$category = trim($_GET['category'] ?? '');

$sql    = "SELECT * FROM spare_parts WHERE 1=1";
$params = [];

if ($search !== '') {
    $sql .= " AND (part_name LIKE ? OR description LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}
if ($category !=='' && $category !== 'all') {
    $sql .= " AND category = ?";
    $params[] = $category;
}
$sql .= " ORDER BY part_name ASC";

try {
    $stmt  = $pdo->prepare($sql);
    $stmt->execute($params);
    $parts = $stmt->fetchAll();
} catch (PDOException $e) {
    $parts = [];
}

// Fetch distinct categories
try {
    $cats = $pdo->query("SELECT DISTINCT category FROM spare_parts ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $cats = [];
}

$catIcons = [
    'Brakes'     => 'fa-circle-dot',
    'Engine'     => 'fa-wrench',
    'Suspension' => 'fa-car-burst',
    'Electrical' => 'fa-bolt',
    'Cooling'    => 'fa-temperature-low',
    'Tyres'      => 'fa-circle',
    'Body'       => 'fa-car',
    'Filters'    => 'fa-filter',
];

$pageTitle = 'Shop Spare Parts';
$rootPath  = '';
include 'header.php';
?>

<main>

<section class="page-hero">
    <div class="page-hero-content">
        <span class="section-tag">Spare Parts</span>
        <h1>Shop<br>Parts</h1>
        <p>Genuine and quality-tested spare parts for cars and motorcycles — all in stock and priced in UGX.</p>
    </div>
</section>

<!-- ── Admin Add Part ─── -->
<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
<div class="admin-panel">
    <?php echo $message; ?>
    <div class="admin-panel-card">
        <div class="admin-panel-title"><i class="fa-solid fa-circle-plus"></i> Add New Part</div>
        <form action="shop_parts.php" method="POST" style="grid-template-columns:1fr 1fr;">
            <div class="form-group">
                <label>Part Name *</label>
                <input type="text" name="name" placeholder="e.g. Front Brake Pads" required>
            </div>
            <div class="form-group">
                <label>Category *</label>
                <input type="text" name="category" placeholder="e.g. Brakes" required>
            </div>
            <div class="form-group">
                <label>Price (UGX) *</label>
                <input type="number" name="price" placeholder="e.g. 85000" min="0" required>
            </div>
            <div class="form-group">
                <label>Quantity / Stock *</label>
                <input type="number" name="quantity" placeholder="e.g. 10" min="0" required>
            </div>
            <div class="form-group full">
                <label>Description</label>
                <textarea name="description" rows="3" placeholder="Brief description of the part…"></textarea>
            </div>
            <div class="form-submit">
                <button type="submit" name="add_part" class="btn-primary" style="display:inline-flex;align-items:center;gap:8px;font-family:var(--font-head);font-size:13px;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;background:var(--rust);color:#000;padding:11px 22px;border-radius:9px;border:none;cursor:pointer;">
                    <i class="fa-solid fa-plus"></i> Add Part
                </button>
            </div>
        </form>
    </div>
</div>
<?php else: ?>
    <?php echo $message; ?>
<?php endif; ?>

<!-- ── Shop Controls ─── -->
<div class="shop-header">
    <div style="max-width:1200px; margin:0 auto;">
        <div style="margin-bottom:20px;">
            <span class="section-tag">Browse Parts</span>
            <h2 style="font-size:clamp(24px,3vw,36px);font-weight:800;text-transform:uppercase;color:var(--white);"><?= count($parts) ?> Parts Available</h2>
        </div>
        <div class="shop-controls">
            <form method="GET" style="display:contents;">
                <div class="shop-search">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" id="parts-search" name="search" placeholder="Search parts…" value="<?= htmlspecialchars($search) ?>">
                </div>
                <div class="category-filters">
                    <a href="shop_parts.php" class="filter-btn <?= !$category ? 'active' : '' ?>" data-cat="all">All</a>
                    <?php foreach ($cats as $cat): ?>
                        <a href="shop_parts.php?category=<?= urlencode($cat) ?><?= $search ? '&search='.urlencode($search) : '' ?>"
                           class="filter-btn <?= $category === $cat ? 'active' : '' ?>"
                           data-cat="<?= strtolower(htmlspecialchars($cat)) ?>">
                            <?= htmlspecialchars($cat) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ── Parts Grid ─── -->
<div class="parts-grid">
    <?php if (empty($parts)): ?>
        <div style="grid-column:1/-1; text-align:center; padding:60px 20px; color:var(--muted);">
            <i class="fa-solid fa-box-open" style="font-size:48px; margin-bottom:16px; display:block;"></i>
            <p>No parts found. Try adjusting your search or filter.</p>
        </div>
    <?php else: ?>
        <?php foreach ($parts as $part): ?>
        <?php 
          $qty =(int)($part['quantity'] ?? 0);
          
          if($qty == 0){
            $stockClass ='out-stock';
            $stockLabel ='Out of Stock';
          }elseif($qty <=5){
            $stockClass ='low-stock';
            $stockLabel ="Only $qty left";
          }else{
            $stockClass ='in-stock';
            $stockLabel ='In Stock';
          }
          $cat = $part['category'] ?? '';
          $icon = $catIcons[$cat] ?? 'fa-cog';
          $price = number_format($part['price'] ?? 0, 0);
        ?>
        <div class="part-card"
             data-name="<?= strtolower(htmlspecialchars($part['part_name'])) ?>"
             data-cat="<?= strtolower(htmlspecialchars($cat)) ?>">
            <div class="part-card-img">
                <i class="fa-solid <?= $icon ?>" style="font-size:52px;color:var(--border);"></i>
            </div>
            <div class="part-card-body">
                <span class="part-badge"><?= htmlspecialchars($cat) ?></span>
                <div class="part-name"><?= htmlspecialchars($part['part_name']) ?></div>
                <div class="part-desc"><?= htmlspecialchars($part['description'] ?? 'Quality auto spare part.') ?></div>
                <div class="part-footer">
                    <div class="part-price">UGX <?= $price ?> <small>/unit</small></div>
                    <span class="part-stock <?= $stockClass ?>"><?= $stockLabel ?></span>
                </div>
                <?php if ($qty > 0): ?>
                <a href="bookings.php?service=parts&part=<?= urlencode($part['part_name']) ?>"
                   style="display:block;margin-top:14px;background:var(--rust);color:#000;text-align:center;padding:10px;border-radius:8px;font-family:var(--font-head);font-size:13px;font-weight:700;letter-spacing:0.05em;text-transform:uppercase;text-decoration:none;transition:background .25s;">
                    <i class="fa-solid fa-cart-shopping"></i> Order Now
                </a>
                <?php else: ?>
                <div style="display:block;margin-top:14px;background:var(--bg3);color:var(--muted);text-align:center;padding:10px;border-radius:8px;font-family:var(--font-head);font-size:13px;font-weight:700;letter-spacing:0.05em;text-transform:uppercase;">
                    Notify Me
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</main>

<?php include 'footer.php'; ?>
