@if ($product)

    <div class="col flex-col-1 max-w-50">
            <div class="card h-100 product-card border-0 shadow-sm overflow-hidden">
                <a href="{{ $product->url }}" class="text-decoration-none text-dark">
                    <div class="product-image-container position-relative">
                        <img src="{{ RvMedia::getImageUrl($product->image, null, false, RvMedia::getDefaultImage()) }}" class="card-img-top" alt="Áo len" style="object-fit: cover;" onerror="this.src='assets/images/no-image.jpg'">
                    </div>
                </a>
                <div class="card-body text-center p-2">
                    <p class="card-text mb-2 text-truncate fw-medium" title="Áo len">
                        {{ $product->name }}
                    </p>
                    <div class="price fw-bold fs-5 mb-2" style="color: #174DAF;">{{ format_price($product->front_sale_price_with_taxes) }}</div>
                </div>
            </div>
        </div>

@endif

