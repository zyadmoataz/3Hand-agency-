import '../css/app.css';

document.addEventListener('DOMContentLoaded', () => {
  const html = document.documentElement;
  // theme
  const stored = localStorage.getItem('theme');
  if (stored === 'dark') html.classList.add('dark');

  const themeToggle = document.getElementById('themeToggle');
  themeToggle?.addEventListener('click', () => {
    html.classList.toggle('dark');
    localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
  });

  // mobile menu
  const mobileBtn = document.getElementById('mobileMenuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  mobileBtn?.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

  // keyboard shortcuts
  window.addEventListener('keydown', (e) => {
    if (e.altKey && e.key.toLowerCase() === 'h') {
      window.location.href = '/';
    }
    if (e.altKey && e.key.toLowerCase() === 'u') {
      window.location.href = '/users';
    }
    if (e.ctrlKey && e.key.toLowerCase() === 'a') {
      const add = document.querySelector('a[href$="/users/create"]');
      if (add) { e.preventDefault(); add.click(); }
    }
  });

  // bulk delete
  const bulkBtn = document.getElementById('bulkDeleteBtn');
  const table = document.getElementById('usersTable');
  bulkBtn?.addEventListener('click', () => {
    const checked = Array.from(document.querySelectorAll('.rowCheckbox:checked')).map(ch => ch.value);
    if (!checked.length) return alert('No rows selected');
    if (!confirm(`Delete ${checked.length} users?`)) return;
    // Create a form to submit the IDs to a backend route (not implemented here).
    // For demo: just remove rows client-side:
    checked.forEach(id => {
      const tr = table.querySelector(`tr[data-id="${id}"]`);
      tr?.remove();
    });
  });

  const selectAll = document.getElementById('selectAll');
  selectAll?.addEventListener('change', (e) => {
    document.querySelectorAll('.rowCheckbox').forEach(cb => { cb.checked = e.target.checked; });
  });
});
