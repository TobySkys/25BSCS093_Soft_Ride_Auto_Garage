
// Mobile nav toggle
function toggleMenu() {
  const nav = document.getElementById('navbar');
  if (nav) nav.classList.toggle('active');
}

// Close nav on outside click
document.addEventListener('click', function (e) {
  const nav = document.getElementById('navbar');
  const menu = document.querySelector('.menu');
  if (nav && menu && !nav.contains(e.target) && !menu.contains(e.target)) {
    nav.classList.remove('active');
  }
});

// Active nav link highlight
document.addEventListener('DOMContentLoaded', function () {
  const current = window.location.pathname.split('/').pop() || 'index.php';
  document.querySelectorAll('nav#navbar a').forEach(link => {
    if (link.getAttribute('href') === current) {
      link.classList.add('active');
    }
  });
});

// Parts search + filter
function initShop() {
  const searchInput = document.getElementById('parts-search');
  const filterBtns  = document.querySelectorAll('.filter-btn');
  const partCards   = document.querySelectorAll('.part-card');

  function applyFilters() {
    const query    = searchInput ? searchInput.value.toLowerCase() : '';
    const activeBtn = document.querySelector('.filter-btn.active');
    const category = activeBtn ? activeBtn.dataset.cat : 'all';

    partCards.forEach(card => {
      const name = (card.dataset.name || '').toLowerCase();
      const cat  = (card.dataset.cat  || '').toLowerCase();
      const matchQuery = !query || name.includes(query);
      const matchCat   = category === 'all' || cat === category;
      card.style.display = (matchQuery && matchCat) ? '' : 'none';
    });
  }

  if (searchInput) searchInput.addEventListener('input', applyFilters);

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      applyFilters();
    });
  });
}

// Set min booking date to today
document.addEventListener('DOMContentLoaded', function () {
  const dateInputs = document.querySelectorAll('input[type="date"]');
  const today = new Date().toISOString().split('T')[0];
  dateInputs.forEach(inp => { if (!inp.min) inp.min = today; });
});
