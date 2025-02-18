    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/backend') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('assets/backend') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('assets/backend') }}/js/plugins.js"></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/toastify-js"
    ></script>
    <script
      type="text/javascript"
      src="{{ asset('assets/backend') }}/libs/choices.js/public/{{ asset('assets/backend') }}/scripts/choices.min.js"
    ></script>
    <script
      type="text/javascript"
      src="{{ asset('assets/backend') }}/libs/flatpickr/flatpickr.min.js"
    ></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/backend') }}/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/backend') }}/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="{{ asset('assets/backend') }}/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/backend') }}/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/backend') }}/js/pages/dashboard-ecommerce.init.js"></script>

    <svg
      id="SvgjsSvg1158"
      width="2"
      height="0"
      xmlns="http://www.w3.org/2000/svg"
      version="1.1"
      xmlns:xlink="http://www.w3.org/1999/xlink"
      xmlns:svgjs="http://svgjs.dev"
      style="
        overflow: hidden;
        top: -100%;
        left: -100%;
        position: absolute;
        opacity: 0;
      "
    >
      <defs id="SvgjsDefs1159"></defs>
      <polyline id="SvgjsPolyline1160" points="0,0"></polyline>
      <path
        id="SvgjsPath1161"
        d="M-1 266.11199999999997L-1 266.11199999999997L55.54668880494173 266.11199999999997L111.09337760988346 266.11199999999997L166.64006641482518 266.11199999999997L222.18675521976692 266.11199999999997L277.73344402470866 266.11199999999997L333.28013282965037 266.11199999999997L388.82682163459214 266.11199999999997L444.37351043953385 266.11199999999997L499.92019924447555 266.11199999999997L555.4668880494173 266.11199999999997L611.013576854359 266.11199999999997C611.013576854359 266.11199999999997 611.013576854359 266.11199999999997 611.013576854359 266.11199999999997 "
      ></path></svg>
    ><!-- App js -->
    <script src="{{ asset('assets/backend') }}/js/app.js"></script>
  <div class="flatpickr-calendar rangeMode animate" tabindex="-1">
      <div class="flatpickr-months">
        <span class="flatpickr-prev-month"
          ><svg
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 17 17"
          >
            <g></g>
            <path
              d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"
            ></path>
        </svg>
    </span>
        <div class="flatpickr-month">
          <div class="flatpickr-current-month">
            <select
              class="flatpickr-monthDropdown-months"
              aria-label="Month"
              tabindex="-1"
            >
              <option
                class="flatpickr-monthDropdown-month"
                value="0"
                tabindex="-1"
              >
                January
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="1"
                tabindex="-1"
              >
                February
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="2"
                tabindex="-1"
              >
                March
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="3"
                tabindex="-1"
              >
                April
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="4"
                tabindex="-1"
              >
                May
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="5"
                tabindex="-1"
              >
                June
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="6"
                tabindex="-1"
              >
                July
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="7"
                tabindex="-1"
              >
                August
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="8"
                tabindex="-1"
              >
                September
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="9"
                tabindex="-1"
              >
                October
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="10"
                tabindex="-1"
              >
                November
              </option>
              <option
                class="flatpickr-monthDropdown-month"
                value="11"
                tabindex="-1"
              >
                December
              </option>
            </select>
            <div class="numInputWrapper">
              <input
                class="numInput cur-year"
                type="number"
                tabindex="-1"
                aria-label="Year"
              /><span class="arrowUp"></span><span class="arrowDown"></span>
            </div>
          </div>
        </div>
        <span class="flatpickr-next-month"
          ><svg
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 17 17"
          >
            <g></g>
            <path
              d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"
            ></path></svg>
        </span>
      </div>
      <div class="flatpickr-innerContainer">
        <div class="flatpickr-rContainer">
          <div class="flatpickr-weekdays">
            <div class="flatpickr-weekdaycontainer">
              <span class="flatpickr-weekday"> Sun</span
              ><span class="flatpickr-weekday">Mon</span
              ><span class="flatpickr-weekday">Tue</span
              ><span class="flatpickr-weekday">Wed</span
              ><span class="flatpickr-weekday">Thu</span
              ><span class="flatpickr-weekday">Fri</span
              ><span class="flatpickr-weekday">Sat </span>
            </div>
          </div>
          <div class="flatpickr-days" tabindex="-1">
            <div class="dayContainer">
              <span
                class="flatpickr-day prevMonthDay"
                aria-label="December 26, 2021"
                tabindex="-1"
                >26</span
              ><span
                class="flatpickr-day prevMonthDay"
                aria-label="December 27, 2021"
                tabindex="-1"
                >27</span
              ><span
                class="flatpickr-day prevMonthDay"
                aria-label="December 28, 2021"
                tabindex="-1"
                >28</span
              ><span
                class="flatpickr-day prevMonthDay"
                aria-label="December 29, 2021"
                tabindex="-1"
                >29</span
              ><span
                class="flatpickr-day prevMonthDay"
                aria-label="December 30, 2021"
                tabindex="-1"
                >30</span
              ><span
                class="flatpickr-day prevMonthDay"
                aria-label="December 31, 2021"
                tabindex="-1"
                >31</span
              ><span
                class="flatpickr-day selected startRange"
                aria-label="January 1, 2022"
                tabindex="-1"
                >1</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 2, 2022"
                tabindex="-1"
                >2</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 3, 2022"
                tabindex="-1"
                >3</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 4, 2022"
                tabindex="-1"
                >4</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 5, 2022"
                tabindex="-1"
                >5</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 6, 2022"
                tabindex="-1"
                >6</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 7, 2022"
                tabindex="-1"
                >7</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 8, 2022"
                tabindex="-1"
                >8</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 9, 2022"
                tabindex="-1"
                >9</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 10, 2022"
                tabindex="-1"
                >10</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 11, 2022"
                tabindex="-1"
                >11</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 12, 2022"
                tabindex="-1"
                >12</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 13, 2022"
                tabindex="-1"
                >13</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 14, 2022"
                tabindex="-1"
                >14</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 15, 2022"
                tabindex="-1"
                >15</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 16, 2022"
                tabindex="-1"
                >16</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 17, 2022"
                tabindex="-1"
                >17</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 18, 2022"
                tabindex="-1"
                >18</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 19, 2022"
                tabindex="-1"
                >19</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 20, 2022"
                tabindex="-1"
                >20</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 21, 2022"
                tabindex="-1"
                >21</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 22, 2022"
                tabindex="-1"
                >22</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 23, 2022"
                tabindex="-1"
                >23</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 24, 2022"
                tabindex="-1"
                >24</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 25, 2022"
                tabindex="-1"
                >25</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 26, 2022"
                tabindex="-1"
                >26</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 27, 2022"
                tabindex="-1"
                >27</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 28, 2022"
                tabindex="-1"
                >28</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 29, 2022"
                tabindex="-1"
                >29</span
              ><span
                class="flatpickr-day inRange"
                aria-label="January 30, 2022"
                tabindex="-1"
                >30</span
              ><span
                class="flatpickr-day selected endRange"
                aria-label="January 31, 2022"
                tabindex="-1"
                >31</span
              ><span
                class="flatpickr-day nextMonthDay"
                aria-label="February 1, 2022"
                tabindex="-1"
                >1</span
              ><span
                class="flatpickr-day nextMonthDay"
                aria-label="February 2, 2022"
                tabindex="-1"
                >2</span
              ><span
                class="flatpickr-day nextMonthDay"
                aria-label="February 3, 2022"
                tabindex="-1"
                >3</span
              ><span
                class="flatpickr-day nextMonthDay"
                aria-label="February 4, 2022"
                tabindex="-1"
                >4</span
              ><span
                class="flatpickr-day nextMonthDay"
                aria-label="February 5, 2022"
                tabindex="-1"
                >5</span
              >
            </div>
          </div>
        </div>
      </div>
    </div>

     <div class="jvm-tooltip" style="top: 559.5px; left: 1177.88px">
      Palestine
    </div> 