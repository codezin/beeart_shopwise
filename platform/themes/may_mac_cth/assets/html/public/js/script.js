document.addEventListener("DOMContentLoaded", function () {
  const fadeElements = document.querySelectorAll(".fade-element");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
      } else {
        entry.target.classList.remove("visible");
      }
    });
  }, { threshold: 0.5 });

  fadeElements.forEach(el => observer.observe(el));
});

// Breadcrumb
document.addEventListener('DOMContentLoaded', async function () {
    const breadcrumb = document.getElementById('breadcrumb');
    if (!breadcrumb) return;

    const currentPage = location.pathname.split('/').pop();

    if (currentPage === 'product-detail.php') {
        return; 
    }

    if (currentPage === 'product-detail.html') {
        const urlParams = new URLSearchParams(location.search);
        const productName = urlParams.get('name') || 'Chi tiết sản phẩm';

        breadcrumb.innerHTML = `
            <a href="index.html">Trang chủ</a>
            <span class="sep">/</span>
            <a href="products.html">Sản phẩm</a>
            <span class="sep">/</span>
            <span class="current">${productName}</span>
        `;
        return;
    }

    const pageMap = {
        'index.html'       : 'Trang chủ',
        'about-us.html'    : 'Về chúng tôi',
        'products.html'    : 'Sản phẩm',
        'guide.html'       : 'Hướng dẫn',
        'news.html'        : 'Tin tức',
        'news-detail.html' : 'Tin tức',
        'contact.html'     : 'Liên hệ',
        'cart.html'        : 'Giỏ hàng',
        'order.html'       : 'Đặt hàng',
        'thankyou.html'    : 'Cảm ơn'
    };

    const pageName = pageMap[currentPage] || 'Trang chủ';

    if (currentPage === 'index.html') {
        breadcrumb.innerHTML = `<span class="current">${pageName}</span>`;
    } else {
        breadcrumb.innerHTML = `
            <a href="index.html">Trang chủ</a>
            <span class="sep"> > </span>
            <span class="current">${pageName}</span>
        `;
    }
});

