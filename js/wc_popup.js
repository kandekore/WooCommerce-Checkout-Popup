jQuery(document).ready(function ($) {
  $("body").on("click", ".checkout-button", function (e) {
    e.preventDefault();
    // Build the popup
    var popup_html =
      '<div id="wc-popup-wrapper" style="width:' +
      wc_popup_params.popup_width +
      "px; height:" +
      wc_popup_params.popup_height +
      'px;">';
    popup_html +=
      '<div id="wc-popup-content">' + wc_popup_params.popup_content + "</div>";
    popup_html +=
      '<button id="wc-popup-close">' +
      wc_popup_params.button_text +
      "</button>";
    popup_html += "</div>";
    $("body").append(popup_html);
    $("#wc-popup-wrapper").show();
  });
  $("body").on("click", "#wc-popup-close", function () {
    $("#wc-popup-wrapper").remove();
    window.location.href = "/checkout/";
  });
});
