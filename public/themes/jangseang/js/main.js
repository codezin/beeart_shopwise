const BASE_URL = `${window.location.protocol}//${window.location.host}`;
const PATH_URL = window.location.pathname;
const FULL_URL = window.location.href;
const GET_PARAM = (key) => new URL(FULL_URL).searchParams.get(key);

(function ($) {
  $(() => {
    const isoCountries = [
      {
        text: "Vietnamese",
        dial_code: "Vietnamese",
        id: "vi",
      },
      {
        text: "Enghish",
        dial_code: "Enghish",
        id: "en",
      },
      {
        text: "Korean",
        dial_code: "Korean",
        id: "ko",
      },
    ];

    function formatCountry(country) {
      if (!country.id) {
        return country.text;
      }
      const $country = $(
        `<span class="fi fi-${country.id.toLowerCase()}"></span>` +
          `<span class="flag-text">${country.dial_code}</span>`,
      );
      return $country;
    }

    function formatTemplate(country) {
      if (!country.id) {
        return country.text;
      }
      const $country = $(
        `<span class="fi fi-${country.id.toLowerCase()}"></span>` +
          `<span class="flag-text">${country.text}</span>`,
      );
      return $country;
    }

    $("[name='country']").select2({
      width: "100%",
      placeholder: "Select a country",
      templateResult: formatTemplate,
      templateSelection: formatCountry,
      data: isoCountries,
    });

    $("select[name='country']").val($("html").attr("lang"));
    $("select[name='country']").trigger('change');
    $(document).on("change","select[name='country']",function(){
        window.location = window.location.origin + "/" + $(this).val();
    });
  });

  const checkbox = document.getElementById("openSidebarMenu");

  // Add an event listener for the 'change' event
  checkbox.addEventListener("change", function () {
    // When the checkbox is checked
    if (this.checked) {
      // Add the 'no-scroll' class to the body
      document.body.classList.add("no-scroll");
    } else {
      // Remove the 'no-scroll' class from the body
      document.body.classList.remove("no-scroll");
    }
  });
})(jQuery);

document.addEventListener("DOMContentLoaded", () => {
  // Lấy phần tử header
  const header = document.querySelector("header");

  // Kiểm tra URL hiện tại
  if (
    window.location.pathname === "/" ||
    window.location.pathname === "/index.html" ||
    window.location.pathname === "/index.php"
  ) {
    // Nếu đây là trang chủ, thêm class 'home-header' vào header
    header.classList.add("home-header");
  }
});

$(".product-section-list").slick({
  centerMode: true,
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
});

$(".brands-section-row").slick({
  rows: 2,
  slidesToShow: 5,
  centerPadding: "40px",
  responsive: [
    {
      breakpoint: 768,
      settings: {
        centerPadding: "10px",
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 480,
      arrows: false,
      settings: {
        centerPadding: "10px",
        slidesToShow: 2,
      },
    },
  ],
});

$(document).ready(() => {
  $(".pagination li")
    .not(".disabled")
    .click(function () {
      const $this = $(this);
      if ($this.text() === "...") return; // Do nothing if '...' is clicked
      $(".pagination li").removeClass("active");
      $this.addClass("active");
      // Implement your logic here to fetch and display the correct page
    });

  // Pagination previous button
  $(".pagination li")
    .first()
    .click(() => {
      const $active = $(".pagination li.active");
      if ($active.prev().hasClass("disabled")) return; // Do nothing if already at the first page
      $active.removeClass("active").prev().addClass("active");
      // Implement your logic here to fetch and display the previous page
    });

  // Pagination next button
  $(".pagination li")
    .last()
    .click(() => {
      const $active = $(".pagination li.active");
      if ($active.next().hasClass("disabled")) return; // Do nothing if already at the last page
      $active.removeClass("active").next().addClass("active");
      // Implement your logic here to fetch and display the next page
    });
  var template = {
    html: "https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/templates/default-book-view.html",
    links: [
      {
        rel: "stylesheet",
        href: "https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/css/font-awesome.min.css",
      },
    ],
    styles: ["https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/css/black-book-view.css"],
    script: "https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/js/default-book-view.js",
  };
  // Book {
  if ($(".profile-section #container2").length) {
    $(".profile-section #container2").FlipBook({
      pdf: "../img/drylab.pdf",
      template: template,
    });
  }
  // }
});
var yourNavigation = $(".header");
    stickyDiv = "sticky";
    yourHeader = $('.header-top').height();

$(window).scroll(function() {
  if( $(this).scrollTop() > yourHeader ) {
    yourNavigation.addClass(stickyDiv);
  } else {
    yourNavigation.removeClass(stickyDiv);
  }
});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJtYWluLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImNvbnN0IEJBU0VfVVJMID0gYCR7d2luZG93LmxvY2F0aW9uLnByb3RvY29sfS8vJHt3aW5kb3cubG9jYXRpb24uaG9zdH1gO1xyXG5jb25zdCBQQVRIX1VSTCA9IHdpbmRvdy5sb2NhdGlvbi5wYXRobmFtZTtcclxuY29uc3QgRlVMTF9VUkwgPSB3aW5kb3cubG9jYXRpb24uaHJlZjtcclxuY29uc3QgR0VUX1BBUkFNID0gKGtleSkgPT4gbmV3IFVSTChGVUxMX1VSTCkuc2VhcmNoUGFyYW1zLmdldChrZXkpO1xyXG5cclxuKGZ1bmN0aW9uICgkKSB7XHJcbiAgJCgoKSA9PiB7XHJcbiAgICBjb25zdCBpc29Db3VudHJpZXMgPSBbXHJcbiAgICAgIHtcclxuICAgICAgICB0ZXh0OiBcIlZpZXRuYW1lc2VcIixcclxuICAgICAgICBkaWFsX2NvZGU6IFwiVmlldG5hbWVzZVwiLFxyXG4gICAgICAgIGlkOiBcIlZOXCIsXHJcbiAgICAgIH0sXHJcbiAgICAgIHtcclxuICAgICAgICB0ZXh0OiBcIktvcmVhblwiLFxyXG4gICAgICAgIGRpYWxfY29kZTogXCJLb3JlYW5cIixcclxuICAgICAgICBpZDogXCJLUlwiLFxyXG4gICAgICB9LFxyXG4gICAgXTtcclxuXHJcbiAgICBmdW5jdGlvbiBmb3JtYXRDb3VudHJ5KGNvdW50cnkpIHtcclxuICAgICAgaWYgKCFjb3VudHJ5LmlkKSB7XHJcbiAgICAgICAgcmV0dXJuIGNvdW50cnkudGV4dDtcclxuICAgICAgfVxyXG4gICAgICBjb25zdCAkY291bnRyeSA9ICQoXHJcbiAgICAgICAgYDxzcGFuIGNsYXNzPVwiZmkgZmktJHtjb3VudHJ5LmlkLnRvTG93ZXJDYXNlKCl9XCI+PC9zcGFuPmAgK1xyXG4gICAgICAgICAgYDxzcGFuIGNsYXNzPVwiZmxhZy10ZXh0XCI+JHtjb3VudHJ5LmRpYWxfY29kZX08L3NwYW4+YCxcclxuICAgICAgKTtcclxuICAgICAgcmV0dXJuICRjb3VudHJ5O1xyXG4gICAgfVxyXG5cclxuICAgIGZ1bmN0aW9uIGZvcm1hdFRlbXBsYXRlKGNvdW50cnkpIHtcclxuICAgICAgaWYgKCFjb3VudHJ5LmlkKSB7XHJcbiAgICAgICAgcmV0dXJuIGNvdW50cnkudGV4dDtcclxuICAgICAgfVxyXG4gICAgICBjb25zdCAkY291bnRyeSA9ICQoXHJcbiAgICAgICAgYDxzcGFuIGNsYXNzPVwiZmkgZmktJHtjb3VudHJ5LmlkLnRvTG93ZXJDYXNlKCl9XCI+PC9zcGFuPmAgK1xyXG4gICAgICAgICAgYDxzcGFuIGNsYXNzPVwiZmxhZy10ZXh0XCI+JHtjb3VudHJ5LnRleHR9PC9zcGFuPmAsXHJcbiAgICAgICk7XHJcbiAgICAgIHJldHVybiAkY291bnRyeTtcclxuICAgIH1cclxuXHJcbiAgICAkKFwiW25hbWU9J2NvdW50cnknXVwiKS5zZWxlY3QyKHtcclxuICAgICAgd2lkdGg6IFwiMTAwJVwiLFxyXG4gICAgICBwbGFjZWhvbGRlcjogXCJTZWxlY3QgYSBjb3VudHJ5XCIsXHJcbiAgICAgIHRlbXBsYXRlUmVzdWx0OiBmb3JtYXRUZW1wbGF0ZSxcclxuICAgICAgdGVtcGxhdGVTZWxlY3Rpb246IGZvcm1hdENvdW50cnksXHJcbiAgICAgIGRhdGE6IGlzb0NvdW50cmllcyxcclxuICAgIH0pO1xyXG4gIH0pO1xyXG5cclxuICBjb25zdCBjaGVja2JveCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwib3BlblNpZGViYXJNZW51XCIpO1xyXG5cclxuICAvLyBBZGQgYW4gZXZlbnQgbGlzdGVuZXIgZm9yIHRoZSAnY2hhbmdlJyBldmVudFxyXG4gIGNoZWNrYm94LmFkZEV2ZW50TGlzdGVuZXIoXCJjaGFuZ2VcIiwgZnVuY3Rpb24gKCkge1xyXG4gICAgLy8gV2hlbiB0aGUgY2hlY2tib3ggaXMgY2hlY2tlZFxyXG4gICAgaWYgKHRoaXMuY2hlY2tlZCkge1xyXG4gICAgICAvLyBBZGQgdGhlICduby1zY3JvbGwnIGNsYXNzIHRvIHRoZSBib2R5XHJcbiAgICAgIGRvY3VtZW50LmJvZHkuY2xhc3NMaXN0LmFkZChcIm5vLXNjcm9sbFwiKTtcclxuICAgIH0gZWxzZSB7XHJcbiAgICAgIC8vIFJlbW92ZSB0aGUgJ25vLXNjcm9sbCcgY2xhc3MgZnJvbSB0aGUgYm9keVxyXG4gICAgICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5yZW1vdmUoXCJuby1zY3JvbGxcIik7XHJcbiAgICB9XHJcbiAgfSk7XHJcbn0pKGpRdWVyeSk7XHJcblxyXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLCAoKSA9PiB7XHJcbiAgLy8gTOG6pXkgcGjhuqduIHThu60gaGVhZGVyXHJcbiAgY29uc3QgaGVhZGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcImhlYWRlclwiKTtcclxuXHJcbiAgLy8gS2nhu4NtIHRyYSBVUkwgaGnhu4duIHThuqFpXHJcbiAgaWYgKFxyXG4gICAgd2luZG93LmxvY2F0aW9uLnBhdGhuYW1lID09PSBcIi9cIiB8fFxyXG4gICAgd2luZG93LmxvY2F0aW9uLnBhdGhuYW1lID09PSBcIi9pbmRleC5odG1sXCIgfHxcclxuICAgIHdpbmRvdy5sb2NhdGlvbi5wYXRobmFtZSA9PT0gXCIvaW5kZXgucGhwXCJcclxuICApIHtcclxuICAgIC8vIE7hur91IMSRw6J5IGzDoCB0cmFuZyBjaOG7pywgdGjDqm0gY2xhc3MgJ2hvbWUtaGVhZGVyJyB2w6BvIGhlYWRlclxyXG4gICAgaGVhZGVyLmNsYXNzTGlzdC5hZGQoXCJob21lLWhlYWRlclwiKTtcclxuICB9XHJcbn0pO1xyXG5cclxuJChcIi5wcm9kdWN0LXNlY3Rpb24tbGlzdFwiKS5zbGljayh7XHJcbiAgY2VudGVyTW9kZTogdHJ1ZSxcclxuICBzbGlkZXNUb1Nob3c6IDMsXHJcbiAgcmVzcG9uc2l2ZTogW1xyXG4gICAge1xyXG4gICAgICBicmVha3BvaW50OiA3NjgsXHJcbiAgICAgIHNldHRpbmdzOiB7XHJcbiAgICAgICAgc2xpZGVzVG9TaG93OiAzLFxyXG4gICAgICB9LFxyXG4gICAgfSxcclxuICAgIHtcclxuICAgICAgYnJlYWtwb2ludDogNDgwLFxyXG4gICAgICBzZXR0aW5nczoge1xyXG4gICAgICAgIHNsaWRlc1RvU2hvdzogMSxcclxuICAgICAgfSxcclxuICAgIH0sXHJcbiAgXSxcclxufSk7XHJcblxyXG4kKFwiLmJyYW5kcy1zZWN0aW9uLXJvd1wiKS5zbGljayh7XHJcbiAgcm93czogMixcclxuICBzbGlkZXNUb1Nob3c6IDUsXHJcbiAgY2VudGVyUGFkZGluZzogXCI0MHB4XCIsXHJcbiAgcmVzcG9uc2l2ZTogW1xyXG4gICAge1xyXG4gICAgICBicmVha3BvaW50OiA3NjgsXHJcbiAgICAgIHNldHRpbmdzOiB7XHJcbiAgICAgICAgY2VudGVyUGFkZGluZzogXCIxMHB4XCIsXHJcbiAgICAgICAgc2xpZGVzVG9TaG93OiAzLFxyXG4gICAgICB9LFxyXG4gICAgfSxcclxuICAgIHtcclxuICAgICAgYnJlYWtwb2ludDogNDgwLFxyXG4gICAgICBhcnJvd3M6IGZhbHNlLFxyXG4gICAgICBzZXR0aW5nczoge1xyXG4gICAgICAgIGNlbnRlclBhZGRpbmc6IFwiMTBweFwiLFxyXG4gICAgICAgIHNsaWRlc1RvU2hvdzogMixcclxuICAgICAgfSxcclxuICAgIH0sXHJcbiAgXSxcclxufSk7XHJcblxyXG4kKGRvY3VtZW50KS5yZWFkeSgoKSA9PiB7XHJcbiAgJChcIi5wYWdpbmF0aW9uIGxpXCIpXHJcbiAgICAubm90KFwiLmRpc2FibGVkXCIpXHJcbiAgICAuY2xpY2soZnVuY3Rpb24gKCkge1xyXG4gICAgICBjb25zdCAkdGhpcyA9ICQodGhpcyk7XHJcbiAgICAgIGlmICgkdGhpcy50ZXh0KCkgPT09IFwiLi4uXCIpIHJldHVybjsgLy8gRG8gbm90aGluZyBpZiAnLi4uJyBpcyBjbGlja2VkXHJcbiAgICAgICQoXCIucGFnaW5hdGlvbiBsaVwiKS5yZW1vdmVDbGFzcyhcImFjdGl2ZVwiKTtcclxuICAgICAgJHRoaXMuYWRkQ2xhc3MoXCJhY3RpdmVcIik7XHJcbiAgICAgIC8vIEltcGxlbWVudCB5b3VyIGxvZ2ljIGhlcmUgdG8gZmV0Y2ggYW5kIGRpc3BsYXkgdGhlIGNvcnJlY3QgcGFnZVxyXG4gICAgfSk7XHJcblxyXG4gIC8vIFBhZ2luYXRpb24gcHJldmlvdXMgYnV0dG9uXHJcbiAgJChcIi5wYWdpbmF0aW9uIGxpXCIpXHJcbiAgICAuZmlyc3QoKVxyXG4gICAgLmNsaWNrKCgpID0+IHtcclxuICAgICAgY29uc3QgJGFjdGl2ZSA9ICQoXCIucGFnaW5hdGlvbiBsaS5hY3RpdmVcIik7XHJcbiAgICAgIGlmICgkYWN0aXZlLnByZXYoKS5oYXNDbGFzcyhcImRpc2FibGVkXCIpKSByZXR1cm47IC8vIERvIG5vdGhpbmcgaWYgYWxyZWFkeSBhdCB0aGUgZmlyc3QgcGFnZVxyXG4gICAgICAkYWN0aXZlLnJlbW92ZUNsYXNzKFwiYWN0aXZlXCIpLnByZXYoKS5hZGRDbGFzcyhcImFjdGl2ZVwiKTtcclxuICAgICAgLy8gSW1wbGVtZW50IHlvdXIgbG9naWMgaGVyZSB0byBmZXRjaCBhbmQgZGlzcGxheSB0aGUgcHJldmlvdXMgcGFnZVxyXG4gICAgfSk7XHJcblxyXG4gIC8vIFBhZ2luYXRpb24gbmV4dCBidXR0b25cclxuICAkKFwiLnBhZ2luYXRpb24gbGlcIilcclxuICAgIC5sYXN0KClcclxuICAgIC5jbGljaygoKSA9PiB7XHJcbiAgICAgIGNvbnN0ICRhY3RpdmUgPSAkKFwiLnBhZ2luYXRpb24gbGkuYWN0aXZlXCIpO1xyXG4gICAgICBpZiAoJGFjdGl2ZS5uZXh0KCkuaGFzQ2xhc3MoXCJkaXNhYmxlZFwiKSkgcmV0dXJuOyAvLyBEbyBub3RoaW5nIGlmIGFscmVhZHkgYXQgdGhlIGxhc3QgcGFnZVxyXG4gICAgICAkYWN0aXZlLnJlbW92ZUNsYXNzKFwiYWN0aXZlXCIpLm5leHQoKS5hZGRDbGFzcyhcImFjdGl2ZVwiKTtcclxuICAgICAgLy8gSW1wbGVtZW50IHlvdXIgbG9naWMgaGVyZSB0byBmZXRjaCBhbmQgZGlzcGxheSB0aGUgbmV4dCBwYWdlXHJcbiAgICB9KTtcclxuICB2YXIgdGVtcGxhdGUgPSB7XHJcbiAgICBodG1sOiBcImh0dHBzOi8vY2RuLmpzZGVsaXZyLm5ldC9ucG0vM2QtZmxpcC1ib29rQDEuOS45L3RlbXBsYXRlcy9kZWZhdWx0LWJvb2stdmlldy5odG1sXCIsXHJcbiAgICBsaW5rczogW1xyXG4gICAgICB7XHJcbiAgICAgICAgcmVsOiBcInN0eWxlc2hlZXRcIixcclxuICAgICAgICBocmVmOiBcImh0dHBzOi8vY2RuLmpzZGVsaXZyLm5ldC9ucG0vM2QtZmxpcC1ib29rQDEuOS45L2Nzcy9mb250LWF3ZXNvbWUubWluLmNzc1wiLFxyXG4gICAgICB9LFxyXG4gICAgXSxcclxuICAgIHN0eWxlczogW1wiaHR0cHM6Ly9jZG4uanNkZWxpdnIubmV0L25wbS8zZC1mbGlwLWJvb2tAMS45LjkvY3NzL2JsYWNrLWJvb2stdmlldy5jc3NcIl0sXHJcbiAgICBzY3JpcHQ6IFwiaHR0cHM6Ly9jZG4uanNkZWxpdnIubmV0L25wbS8zZC1mbGlwLWJvb2tAMS45LjkvanMvZGVmYXVsdC1ib29rLXZpZXcuanNcIixcclxuICB9O1xyXG4gIC8vIEJvb2sge1xyXG4gIGlmICgkKFwiLnByb2ZpbGUtc2VjdGlvbiAjY29udGFpbmVyMlwiKS5sZW5ndGgpIHtcclxuICAgICQoXCIucHJvZmlsZS1zZWN0aW9uICNjb250YWluZXIyXCIpLkZsaXBCb29rKHtcclxuICAgICAgcGRmOiBcIi4uL2ltZy9kcnlsYWIucGRmXCIsXHJcbiAgICAgIHRlbXBsYXRlOiB0ZW1wbGF0ZSxcclxuICAgIH0pO1xyXG4gIH1cclxuICAvLyB9XHJcbn0pO1xyXG4iXSwiZmlsZSI6Im1haW4uanMifQ==
