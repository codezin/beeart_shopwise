  <!-- Footer -->
    <footer class="footer bg-primary text-white py-5">
        <div class="container">
            <div class="row gy-4">
                <!-- Logo + Giới thiệu -->
                <div class="col-12 col-md-4 col-lg-3">
                    <a href="index.html"><img src="../../assets/images/logo2.png" alt="Logo"
                            class="footer-logo mb-3"></a>
                    <p class="footer-slogan">MAY MẶC CTH lắng nghe bạn!</p>
                    <p class="footer-desc">
                        Chúng tôi luôn trân trọng mọi ý kiến đóng góp của khách hàng,
                        không ngừng cải thiện để mang đến sản phẩm và dịch vụ tốt nhất.
                    </p>
                    <a href="contact.html#feedbackForm" class="btn btn-warning footer-btn">
                        ĐÓNG GÓP Ý KIẾN →
                    </a>
                    <p class="footer-tax mt-3"><strong>MÃ SỐ THUẾ:</strong> 0202167805</p>
                </div>

                <!-- Về chúng tôi -->
                <div class="col-6 col-md-4 col-lg-2">
                    <p class="footer-title">VỀ CHÚNG TÔI</p>
                    <ul class="footer-links">
                        <li><a href="about-us.html">Giới thiệu MAY MẶC CTH</a></li>
                        <li><a href="guide.html">Hướng dẫn mua hàng</a></li>
                        <li><a href="guide.html">Hướng dẫn chọn size</a></li>
                        <li><a href="guide.html">Chính sách đổi trả</a></li>
                        <li><a href="guide.html">Chính sách giao hàng</a></li>
                        <li><a href="guide.html">FAQ</a></li>
                    </ul>
                </div>

                <!-- Sản phẩm -->
                <div class="col-6 col-md-4 col-lg-2">
                    <p class="footer-title">SẢN PHẨM</p>
                    <ul class="footer-links" id="footerProductsCategories">
                        <li class="text-muted small">Đang tải...</li>
                    </ul>
                </div>

                <!-- Tin tức -->
                <div class="col-6 col-md-6 col-lg-2">
                    <p class="footer-title">TIN TỨC</p>
                    <ul class="footer-links" id="footerNewsCategories">
                        <li class="text-muted small">Đang tải...</li>
                    </ul>
                </div>

                <!-- Thông tin liên hệ + Nút liên hệ -->
                <div class="col-12 col-md-12 col-lg-3">
                    <p class="footer-title mb-3">THÔNG TIN LIÊN HỆ</p>

                    <div class="d-flex align-items-start mb-2">
                        <i class='bx bx-map text-warning me-3' style="font-size: 1.4rem; min-width: 26px;"></i>
                        <span id="footerAddress" class="text-white">Đang tải địa chỉ...</span>
                    </div>

                    <div class="d-flex align-items-start mb-2">
                        <i class='bx bx-globe text-success me-3' style="font-size: 1.4rem; min-width: 26px;"></i>
                        <span id="footerWebsite" class="text-white">Đang tải website...</span>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <i class='bx bx-phone text-danger me-3' style="font-size: 1.4rem; min-width: 26px;"></i>
                        <span id="footerPhone" class="text-white">Đang tải số điện thoại...</span>
                    </div>

                    <div class="footer-contact-btns mt-3">
                        <a href="../../../../https@zalo.me/078315798" class="contact-card">
                            <div class="contact-icon"><img src="../../assets/images/zalo.png" alt="Zalo"></div>
                            <div class="contact-text"><span class="contact-label">TƯ VẤN QUA</span><span
                                    class="contact-value">ZALO</span></div>
                        </a>
                        <a href="tel_3A+078315798" class="contact-card">
                            <div class="contact-icon"><img src="../../assets/images/hotline.png" alt="Hotline"></div>
                            <div class="contact-text"><span class="contact-label">HOTLINE</span><span
                                    class="contact-value">0783 157 98</span></div>
                        </a>
                        <a href="tel_3A+078315798" class="contact-card">
                            <div class="contact-icon"><img src="../../assets/images/hotline.png" alt="Tại cửa hàng">
                            </div>
                            <div class="contact-text"><span class="contact-label">TẠI CỬA HÀNG</span><span
                                    class="contact-value">078315798</span></div>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="footer-divider my-4">

            <div class="row">
                <div class="col text-center">
                    <p class="mb-2 footer-title">PHƯƠNG THỨC THANH TOÁN</p>
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <img src="../../assets/images/cash.png" height="30" alt="Cash">
                        <img src="../../assets/images/mastercard.png" height="30" alt="Mastercard">
                        <img src="../../assets/images/visa.png" height="30" alt="Visa">
                    </div>
                </div>
            </div>

            <!-- <p class="text-center mt-4 small mb-0">&copy; 2025 MAY MẶC CTH. All rights reserved.</p> -->
        </div>
    </footer>

    <!-- <script src="asset/bootstrap/js/bootstrap.js"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ base }}js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const langButtons = document.querySelectorAll(".choose-lang");
            const currentFlag = document.getElementById("currentFlag");
            const currentLang = document.getElementById("currentLang");

            langButtons.forEach(btn => {
                btn.addEventListener("click", function (e) {
                    e.preventDefault();
                    const lang = this.getAttribute("data-lang");
                    const flag = this.getAttribute("data-flag");

                    currentFlag.src = flag;
                    currentLang.textContent = lang;
                });
            });

            // Hiệu ứng fade-in/fade-out
            const fadeElements = document.querySelectorAll(".fade-element");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                    } else {
                        entry.target.classList.remove("visible");
                    }
                });
            }, { threshold: 0.4 });

            fadeElements.forEach(el => observer.observe(el));
        });

        document.addEventListener('DOMContentLoaded', async () => {
            const bannerContainer = document.getElementById("bannerContainer");
            const dotsContainer = document.getElementById("bannerDots");
            let banners = [];
            let dots = [];
            let currentBanner = 0;
            let interval;

            async function loadBanners() {
                try {
                    const res = await fetch('../../../api/banner/get_banner.php');
                    const data = await res.json();
                    if (!data.success || !data.data.length) return;

                    bannerContainer.querySelectorAll(".banner-image").forEach(img => img.remove());
                    dotsContainer.innerHTML = '';

                    let activeIndex = 0;
                    data.data.forEach(banner => {
                        if (banner.is_active != 1) return;

                        const img = document.createElement('img');
                        img.src = `../../assets/images/upload/${banner.image}`;
                        img.alt = banner.title;
                        img.className = 'banner-image';
                        if (activeIndex === 0) img.classList.add('active');
                        bannerContainer.appendChild(img);

                        // tạo dot
                        const dot = document.createElement('span');
                        dot.className = 'dot';
                        dot.dataset.index = activeIndex;
                        if (activeIndex === 0) dot.classList.add('active');
                        dotsContainer.appendChild(dot);

                        dot.addEventListener('click', (e) => {
                            const idx = parseInt(e.target.dataset.index);
                            showBanner(idx);
                            resetInterval();
                        });

                        activeIndex++;
                    });

                    banners = bannerContainer.querySelectorAll(".banner-image");
                    dots = dotsContainer.querySelectorAll(".dot");

                    if (banners.length > 1) {
                        interval = setInterval(nextBanner, 4000);
                    }
                } catch (err) {
                    console.error('Lỗi load banner:', err);
                }
            }

            function showBanner(index) {
                if (!banners.length) return;
                banners[currentBanner].classList.remove("active");
                dots[currentBanner].classList.remove("active");

                currentBanner = index;
                banners[currentBanner].classList.add("active");
                dots[currentBanner].classList.add("active");
            }

            function nextBanner() {
                showBanner((currentBanner + 1) % banners.length);
            }

            function resetInterval() {
                clearInterval(interval);
                interval = setInterval(nextBanner, 4000);
            }

            await loadBanners();

            //load products
            const productList = document.getElementById('homeProductList');

            async function loadHomeProducts() {
                try {
                    const res = await fetch('../../../api/product/get_product.php');

                    if (!res.ok) {
                        throw new Error(`HTTP ${res.status}`);
                    }

                    const result = await res.json();

                    productList.innerHTML = '';

                    if (!result.success || !result.data || result.data.length === 0) {
                        productList.innerHTML = `<div class="col-12 text-center py-5"><p class="text-muted fs-5">Chưa có sản phẩm nào</p></div>`;
                        return;
                    }

                    const activeProducts = result.data.filter(p => p.is_active == 1);

                    if (activeProducts.length === 0) {
                        productList.innerHTML = `<div class="col-12 text-center py-5"><p class="text-muted fs-5">Chưa có sản phẩm nào được hiển thị</p></div>`;
                        return;
                    }

                    activeProducts.slice(0, 10).forEach(product => {
                        const price = (parseInt(product.price) || 0).toLocaleString('vi-VN');
                        const imageUrl = product.primary_image
                            ? `../../assets/images/upload/${product.primary_image}`
                            : `../../assets/images/no-image.jpg`;

                        const col = document.createElement('div');
                        col.className = 'col';

                        col.innerHTML = `
                            <div class="card h-100 product-card border-0 shadow-sm overflow-hidden">
                                <a href="../../../public/views/client/product-detail.html?id=${product.product_id}" class="text-decoration-none text-dark">
                                    <div class="product-image-container position-relative">
                                        <img src="${imageUrl}"
                                            class="card-img-top"
                                            alt="${product.name}"
                                            style="object-fit: cover;"
                                            onerror="this.src='../../../MayMacCTH/public/assets/images/no-image.jpg'">
                                    </div>
                                </a>
                                <div class="card-body text-center p-2">
                                    <p class="card-text mb-2 text-truncate fw-medium" title="${product.name}">
                                        ${product.name}
                                    </p>
                                    <!--
                                    <p class="product-price text-danger fw-bold fs-5 mb-0">
                                        ${price}<span class="currency-symbol">đ</span>
                                    </p>
                                    -->
                                    <div class="price fw-bold fs-5 mb-2" style="color: #174DAF;">${price}đ</div>
                                </div>
                            </div>
                        `;

                        productList.appendChild(col);
                    });

                } catch (err) {
                    console.error('Lỗi tải sản phẩm:', err);
                    productList.innerHTML = `
                        <div class="col-12 text-center py-5 text-danger">
                            <i class="bi bi-exclamation-triangle"></i><br>
                            Không thể tải sản phẩm. Vui lòng thử lại!
                        </div>
                    `;
                }
            }
            loadHomeProducts();

            const dropdownMenu = document.querySelector('.dropdown-menu-custom');

            if (!dropdownMenu) return;

            dropdownMenu.innerHTML = '';

            try {
                const response = await fetch('../../../api/category/get_category.php@t=' + Date.now());

                if (!response.ok) {
                    throw new Error('Lỗi mạng: ' + response.status);
                }

                const result = await response.json();

                if (!result.success || !Array.isArray(result.data) || result.data.length === 0) {
                    dropdownMenu.innerHTML = '<li><a href="#" class="dropdown-item text-muted">Chưa có danh mục</a></li>';
                    return;
                }

                const activeCategories = result.data.filter(cat =>
                    cat.is_active === undefined || cat.is_active == 1 || cat.is_active === '1'
                );

                if (activeCategories.length === 0) {
                    dropdownMenu.innerHTML = '<li><a href="#" class="dropdown-item text-muted">Không có danh mục nào hiển thị</a></li>';
                    return;
                }

                activeCategories.sort((a, b) => (a.sort_order || 0) - (b.sort_order || 0));

                activeCategories.forEach(category => {
                    const li = document.createElement('li');
                    const a = document.createElement('a');

                    a.href = `../../../public/views/client/products.html?category=${category.category_id}`;
                    a.textContent = category.name.trim();
                    a.className = 'dropdown-item';

                    li.appendChild(a);
                    dropdownMenu.appendChild(li);
                });
            } catch (err) {
                console.error('Lỗi load danh mục:', err);
                dropdownMenu.innerHTML = '<li><a href="#" class="dropdown-item text-danger">Lỗi tải danh mục</a></li>';
            }

            await loadSearchCategories();

            const searchWrap = document.querySelector('.search-dropdown-wrap');
            const searchTrigger = document.querySelector('.search-trigger');
            const searchList = document.getElementById('searchCategoryUl');

            if (searchWrap && searchTrigger && searchList) {
                searchTrigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    searchList.classList.toggle('show');
                });

                document.addEventListener('click', (e) => {
                    if (!searchWrap.contains(e.target)) {
                        searchList.classList.remove('show');
                    }
                });
            }
            const btnSearch = document.getElementById('btnSearch');
            const searchInput = document.getElementById('searchInput');

            const performSearch = () => {
                const keyword = searchInput.value.trim();
                const categoryId = document.getElementById('categorySelectValue').value;

                let url = 'products.html';
                const params = new URLSearchParams();

                if (keyword) params.append('q', keyword);
                if (categoryId) params.append('category', categoryId);

                if (params.toString()) url += '?' + params.toString();
                window.location.href = url;
            };

            if (btnSearch) btnSearch.addEventListener('click', performSearch);
            if (searchInput) searchInput.addEventListener('keypress', e => {
                if (e.key === 'Enter') performSearch();
            });
            updateCartCount();
        });

        function selectSearchCategory(id, name) {
            document.getElementById('categoryDisplayText').innerText = name;
            document.getElementById('categorySelectValue').value = id;

            const searchList = document.getElementById('searchCategoryUl');
            if (searchList) searchList.classList.remove('show');
        }
        async function loadSearchCategories() {
            const ulList = document.getElementById('searchCategoryUl');
            if (!ulList) return;
            ulList.innerHTML = '<li><a href="javascript:void(0)" onclick="selectSearchCategory(\'\', \'Tất cả\')">Tất cả</a></li>';

            try {
                const response = await fetch('../../../api/category/get_category.php@t=' + Date.now());

                if (!response.ok) throw new Error('Lỗi kết nối API');

                const result = await response.json();

                if (result.success && Array.isArray(result.data)) {
                    let categories = result.data;
                    categories.sort((a, b) => a.name.localeCompare(b.name));

                    categories.forEach(category => {
                        const li = document.createElement('li');
                        const a = document.createElement('a');
                        a.href = "javascript:void(0)";
                        const catName = category.name.trim();
                        a.textContent = catName;
                        a.onclick = () => selectSearchCategory(category.category_id, catName);

                        li.appendChild(a);
                        ulList.appendChild(li);
                    });
                } else {
                    console.warn("API trả về thành công nhưng không có dữ liệu danh mục nào.");
                }
            } catch (err) {
                console.error('Lỗi load danh mục:', err);
            }
        }

         function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            const totalItems = cart.length;

            const el = document.getElementById('cartCount');
            if (el) {
                el.textContent = totalItems;
                el.style.display = totalItems > 0 ? 'block' : 'none';
            }
        }

        const BASE_URL = '../../../MayMacCTH';
        document.addEventListener('DOMContentLoaded', async () => {
            const addressEl = document.getElementById('footerAddress');
            const websiteEl = document.getElementById('footerWebsite');
            const phoneEl = document.getElementById('footerPhone');

            if (!addressEl && !websiteEl && !phoneEl) return;

            try {
                const res = await fetch(`https://demo9.sibic.vn/api/contact/get_contact.php?t=${Date.now()}`);
                const data = await res.json();

                if (data.success && data.data && data.data.length > 0) {
                    const c = data.data[0];

                    if (addressEl) {
                        addressEl.textContent = c.address || 'Chưa cập nhật địa chỉ';
                    }

                    if (websiteEl) {
                        if (c.website && c.website.trim()) {
                            const url = c.website.match(/^https?:\/\//i) ? c.website : '../../../../https@/' + c.website;
                            websiteEl.outerHTML = `<a href="${url}" target="_blank" class="text-white text-decoration-none">${c.website}</a>`;
                        } else {
                            websiteEl.textContent = 'Chưa có website';
                        }
                    }

                    if (phoneEl) {
                        phoneEl.textContent = c.phone_number || 'Chưa cập nhật số điện thoại';
                    }
                }
            } catch (err) {
                console.error('Lỗi load footer contact:', err);
            }
        });
        function getExcerpt(contentJson, maxLength = 130) {
            try {
                const blocks = JSON.parse(contentJson).blocks;
                let text = '';
                for (const block of blocks) {
                    if ((block.type === 'paragraph' || block.type === 'header') && block.data.text) {
                        text += block.data.text.replace(/<[^>]*>/g, '') + ' ';
                        if (text.length >= maxLength) break;
                    }
                }
                return text.trim().substring(0, maxLength) + (text.length > maxLength ? '...' : '');
            } catch {
                return 'Xem chi tiết để biết thêm...';
            }
        }

        async function loadHomeNews() {
            const container = document.getElementById('homeNewsContainer');
            if (!container) return;

            // Loading giống news.html
            container.innerHTML = `
            <div class="col-12 text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Đang tải...</span>
                </div>
                <p class="mt-3">Đang tải tin tức...</p>
            </div>`;

            try {
                const res = await fetch(`https://demo9.sibic.vn/api/news/get_news.php?t=${Date.now()}`);
                const result = await res.json();

                if (!result.success || !result.data || result.data.length === 0) {
                    container.innerHTML = `<div class="col-12 text-center py-5"><h5 class="text-muted">Chưa có bài viết nào.</h5></div>`;
                    return;
                }

                const latest3 = result.data
                    .filter(a => a.is_published == 1)
                    .sort((a, b) => new Date(b.created_at) - new Date(a.created_at))
                    .slice(0, 3);

                if (latest3.length === 0) {
                    container.innerHTML = `<div class="col-12 text-center py-5"><h5 class="text-muted">Chưa có bài viết nào.</h5></div>`;
                    return;
                }

                container.innerHTML = latest3.map(article => `
                    <div class="col news-item">
                        <div class="card h-100 news-card shadow-sm border-0">
                            ${article.thumbnail
                        ? `<div style="overflow: hidden; height: 220px;">
                                    <img src="../../../${article.thumbnail}" class="card-img-top" alt="${article.title}" style="height: 100%; width: 100%; object-fit: cover;">
                                </div>`
                        : `<div class="d-flex align-items-center justify-content-center" style="height:220px;">
                                    <i class="bi bi-image fs-1 text-muted"></i>
                                </div>`
                    }
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-2">
                                    <a href="${BASE_URL}/tin-tuc/${article.slug}" class="news-title-link fw-bold text-decoration-none">
                                        ${article.title}
                                    </a>
                                </h5>
                                <p class="text-muted small mb-3">
                                    <i class="bi bi-calendar3"></i>
                                    ${new Date(article.created_at).toLocaleDateString('vi-VN')}
                                    ${article.author ? ` | ${article.author}` : ''}
                                </p>
                                <p class="card-text text-muted flex-grow-1">
                                    ${getExcerpt(article.content || '', 130)}
                                </p>
                            </div>
                        </div>
                    </div>
                `).join('');

            } catch (err) {
                console.error('Lỗi tải tin tức trang chủ:', err);
                container.innerHTML = `<div class="col-12 text-center py-5 text-danger">Lỗi tải dữ liệu. Vui lòng thử lại sau!</div>`;
            }
        }

        document.addEventListener('DOMContentLoaded', loadHomeNews);
        document.getElementById('homeNewsContainer')?.addEventListener('click', function (e) {
            const link = e.target.closest('a[href*="../../../tin-tuc/default.htm"]');
            if (!link) return;

            e.preventDefault();

            const href = link.getAttribute('href');
            const slug = href.split('/').pop();

            if (slug && slug !== '' && slug !== 'tin-tuc') {
                window.location.href = `../../../public/views/client/news-detail.html?slug=${encodeURIComponent(slug)}`;
            }
        });
        async function loadFooterNewsCategories() {
            const container = document.getElementById('footerNewsCategories');
            if (!container) return;

            try {
                const res = await fetch('../../../api/news/get_news_categories.php');
                const result = await res.json();

                // Xóa nội dung cũ
                container.innerHTML = '';

                if (result.success && result.data && result.data.length > 0) {
                    result.data.forEach(cat => {
                        const li = document.createElement('li');
                        const a = document.createElement('a');

                        a.href = `/public/views/client/news.html?id=${cat.id}`;
                        a.textContent = cat.name;
                        li.appendChild(a);
                        container.appendChild(li);
                    });
                } else {
                    container.innerHTML = '<li class="text-muted small">Chưa có danh mục</li>';
                }
            } catch (err) {
                console.error('Lỗi load danh mục footer:', err);
                container.innerHTML = '<li class="text-danger small">Lỗi tải danh mục</li>';
            }
        }
        async function loadFooterProductsCategories() {
            const container = document.getElementById('footerProductsCategories');
            if (!container) return;

            try {
                const res = await fetch('../../../api/category/get_category.php@t=' + Date.now());
                const result = await res.json();

                // Xóa nội dung cũ
                container.innerHTML = '';

                if (result.success && Array.isArray(result.data) && result.data.length > 0) {

                    let categories = result.data;
                    categories.sort((a, b) => a.name.localeCompare(b.name));

                    categories.forEach(cat => {
                        const li = document.createElement('li');
                        const a = document.createElement('a');
                        a.href = `/public/views/client/products.html?category=${cat.category_id}`;
                        a.textContent = cat.name.trim();
                        li.appendChild(a);
                        container.appendChild(li);
                    });
                } else {
                    container.innerHTML = '<li class="text-muted small">Chưa có danh mục</li>';
                }
            } catch (err) {
                console.error('Lỗi load danh mục footer:', err);
                container.innerHTML = '<li class="text-danger small">Lỗi tải danh mục</li>';
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
            loadFooterNewsCategories();
            loadNewsCategoriesDropdown();
            loadFooterProductsCategories();
        });
        async function loadNewsCategoriesDropdown() {
            const dropdown = document.getElementById('newsCategoryDropdown');
            if (!dropdown) return;

            try {
                const res = await fetch('../../../api/news/get_news_categories.php');
                const result = await res.json();

                // Xóa loading
                dropdown.innerHTML = '';

                if (result.success && result.data && result.data.length > 0) {
                    result.data.forEach(cat => {
                        const li = document.createElement('li');
                        const a = document.createElement('a');

                        a.href = `/public/views/client/news.html?id=${cat.id}`;
                        a.textContent = cat.name;
                        li.appendChild(a);
                        dropdown.appendChild(li);
                    });
                } else {
                    dropdown.innerHTML = '<li class="text-center py-3"><small class="text-muted">Chưa có danh mục tin tức</small></li>';
                }
            } catch (err) {
                console.error('Lỗi load danh mục tin tức:', err);
                dropdown.innerHTML = '<li class="text-center py-3 text-danger"><small>Lỗi tải dữ liệu</small></li>';
            }
        }
    </script>
</body>

</html>
