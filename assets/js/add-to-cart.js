jQuery(function ($) {
    function updateCartCount() {

      if (typeof wc_cart_params === 'undefined') {
        console.error('wc_cart_params is not defined');
        return;
      }
  
      $.ajax({
        url: wc_cart_params.ajax_url,
        type: 'POST',
        data: {
          action: 'get_cart_count'
        },
        success: function (response) {
          $('.cart-count').text(response);
        },
        error: function (xhr) {
          console.error('AJAX Error', xhr);
        }
      });
    }
  
    $(document.body).on('added_to_cart', function () {
      updateCartCount();
    });
  
    const observer = new MutationObserver((mutationsList, observer) => {
      setTimeout(updateCartCount, 400);
    });
  
    observer.observe(document.body, {
      childList: true,
      subtree: true,
    });
  
    updateCartCount();
});
  