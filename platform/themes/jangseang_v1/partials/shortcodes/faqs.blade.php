
<main class="page-content">
    <section class="title-header dark">
        <h2>{{ Theme::get('pageName') }}</h2>
        <ul class="breadcrumbs">
            <li><a href="{{ route('public.index') }}">{{__("Home")}}</a></li>
            <li><a href="#">{{ Theme::get('pageName') }}</a></li>
        </ul>

    </section>

    <section class="QA-section">
        <div class="container">
            <div class="QA-section-wrap">
                @php
                    $faqs = get_list_faqs([]);
                @endphp
                @foreach ($faqs as $faq)
                <div class="QA-section-wrap-content">
                    <strong>{{$faq->question}}</strong>
                    {!! $faq->answer !!}
                </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- <section class="about-us-detail-section">
        <div class="container">
            <div class="faqs-list">
            @foreach($categories as $categoryIndex => $category)
                @if (count($categories) > 1)
                    <h4>{{ $category->name }}</h4>
                @endif
                <div class="accordion" id="faq-accordion-{{ $categoryIndex }}">
                    @foreach($category->faqs as $faqIndex => $faq)
                        <div class="card">
                            <div class="card-header" id="heading-faq-{{ $categoryIndex }}-{{ $faqIndex }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left @if (!($categoryIndex == 0 && $faqIndex == 0)) collapsed @endif" type="button" data-toggle="collapse" data-target="#collapse-faq-{{ $categoryIndex }}-{{ $faqIndex }}" aria-expanded="true" aria-controls="collapse-faq-{{ $categoryIndex }}-{{ $faqIndex }}">
                                        {!! BaseHelper::clean($faq->question) !!}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse-faq-{{ $categoryIndex }}-{{ $faqIndex }}" class="collapse @if ($categoryIndex == 0 && $faqIndex == 0) show @endif" aria-labelledby="heading-faq-{{ $categoryIndex }}-{{ $faqIndex }}" data-parent="#faq-accordion-{{ $categoryIndex }}">
                                <div class="card-body">
                                    {!! BaseHelper::clean($faq->answer) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            </div>
        </div>
    </section> --}}
</main>
