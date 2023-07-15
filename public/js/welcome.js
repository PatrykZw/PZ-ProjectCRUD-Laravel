/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/welcome.js ***!
  \*********************************/
$(function () {
  $('div.cars-count a').click(function (event) {
    event.preventDefault();
    $('a.cars-actual-count').text($(this).text());
    getCars($(this).text());
  });
  $('a#filter-button').click(function (event) {
    event.preventDefault();
  });
  $('button.add-cart-button').click(function (event) {
    event.preventDefault();
    $.ajax({
      method: "POST",
      url: WELCOME_DATA.addToCart + $(this).data('id')
    }).done(function () {
      Swal.fire({
        title: 'Brawo!',
        text: 'Pojazd zarezerwowany!',
        icon: 'success',
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-cart-plus"></i> Przejdź do koszyka',
        cancelButtonText: '<i class="fas fa-shopping-bag"></i> Kontynuuj zakupy'
      }).then(function (result) {
        if (result.isConfirmed) {
          window.location = WELCOME_DATA.listCart;
        }
      });
    }).fail(function () {
      Swal.fire('Oops...', 'Wystąpił błąd', 'error');
    });
  });
  function getCars(paginate) {
    var form = $('form.sidebar-filter').serialize();
    $.ajax({
      method: "GET",
      url: "/",
      data: form + "&" + $.param({
        paginate: paginate
      })
    }).done(function (response) {
      $('div#cars-wrapper').empty();
      $.each(response.data, function (index, cars) {
        var html = '<div class="col-6 col-md-6 col-lg-4 mb-3">' + '            <div class="card h-100 border-0">' + '                <div class="card-img-top">' + '                    <img src="' + getImage(cars) + '" class="img-fluid mx-auto d-block" alt="Car Image">' + '                </div>' + '                <div class="card-body text-center">' + '                    <h4 class="card-title">' + cars.name + '                    </h4>' + '                    <h5 class="card-price small">' + '                        <i>PLN ' + cars.price + '</i>' + '                    </h5>' + '                </div>' + '                <button class="btn btn-success btn-sm add-cart-button"' + getDisabled() + ' data-id="' + cars.id + '">' + '                   <i class="fas fa-cart-plus"></i> Dodaj do koszyka' + '                </button>' + '            </div>' + '        </div>';
        $('div#cars-wrapper').append(html);
      });
    });
  }
  function getImage(cars) {
    if (!!cars.image_path) {
      return WELCOME_DATA.storagePath + cars.image_path;
    }
    return WELCOME_DATA.defaultImage;
  }
  function getDisabled() {
    if (WELCOME_DATA.isGuest) {
      return ' disabled';
    }
    return '';
  }
  var rentalDateField = document.getElementById("rental_date");
  var currentDate = new Date().toISOString().split("T")[0];
  rentalDateField.value = currentDate;
  var rentalDateInput = document.getElementById('rental_date');
  var returnDateInput = document.getElementById('return_date');
  var costPerDayInput = document.getElementById('day_repayment');
  var sumCostElement = document.getElementById('sum_cost');
  rentalDateInput.addEventListener('input', calculateDateDifference);
  returnDateInput.addEventListener('input', calculateDateDifference);
  costPerDayInput.addEventListener('input', calculateDateDifference);
  function calculateDateDifference() {
    var rentalDate = new Date(rentalDateInput.value);
    var returnDate = new Date(returnDateInput.value);
    var costPerDay = new Number(costPerDayInput.value);
    rentalDate.setHours(0, 0, 0, 0);
    returnDate.setHours(0, 0, 0, 0);
    if (rentalDate && returnDate && rentalDate <= returnDate) {
      var timeDiff = Math.abs(returnDate.getTime() - rentalDate.getTime());
      var daysDifference = Math.ceil(timeDiff / (1000 * 3600 * 24));
      var sumCost = costPerDay * daysDifference;
      sumCostElement.textContent = sumCost;
    }
  }
});
/******/ })()
;