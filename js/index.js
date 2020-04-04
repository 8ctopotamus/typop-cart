(function($) {
  $toggle = $('.typop-toggle')
  $typopCart = $('.typop-cart')

  function handleTypopToggle(e) {
    e.preventDefault()
    $typopCart.toggleClass('show')
  }

  $toggle.on('click', handleTypopToggle)
})(jQuery)