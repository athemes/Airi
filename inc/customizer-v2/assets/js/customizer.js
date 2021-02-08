jQuery(document).ready(function ($) {
  "use strict";

  /**
   * Slider Custom Control
   */

  // Set our slider defaults and initialise the slider
  $(".slider-custom-control").each(function () {
    var sliderValue = $(this).find(".customize-control-slider-value").val();
    var newSlider = $(this).find(".slider");
    var sliderMinValue = parseFloat(newSlider.attr("slider-min-value"));
    var sliderMaxValue = parseFloat(newSlider.attr("slider-max-value"));
    var sliderStepValue = parseFloat(newSlider.attr("slider-step-value"));

    newSlider.slider({
      value: sliderValue,
      min: sliderMinValue,
      max: sliderMaxValue,
      step: sliderStepValue,
      change: function (e, ui) {
        // Important! When slider stops moving make sure to trigger change event so Customizer knows it has to save the field
        $(this)
          .parent()
          .find(".customize-control-slider-value")
          .trigger("change");
      },
    });
  });

  // Change the value of the input field as the slider is moved
  $(".slider").on("slide", function (event, ui) {
    $(this).parent().find(".customize-control-slider-value").val(ui.value);
  });

  // Reset slider and input field back to the default value
  $(".slider-reset").on("click", function () {
    var resetValue = $(this).attr("slider-reset-value");
    $(this).parent().find(".customize-control-slider-value").val(resetValue);
    $(this).parent().find(".slider").slider("value", resetValue);
  });

  // Update slider if the input field loses focus as it's most likely changed
  $(".customize-control-slider-value").blur(function () {
    var resetValue = $(this).val();
    var slider = $(this).parent().find(".slider");
    var sliderMinValue = parseInt(slider.attr("slider-min-value"));
    var sliderMaxValue = parseInt(slider.attr("slider-max-value"));

    // Make sure our manual input value doesn't exceed the minimum & maxmium values
    if (resetValue < sliderMinValue) {
      resetValue = sliderMinValue;
      $(this).val(resetValue);
    }
    if (resetValue > sliderMaxValue) {
      resetValue = sliderMaxValue;
      $(this).val(resetValue);
    }
    $(this).parent().find(".slider").slider("value", resetValue);
  });

  /**
   * Googe Font Select Custom Control
   */

  $(".google-fonts-list").each(function (i, obj) {
    if (!$(obj).hasClass("select2-hidden-accessible")) {
      $(obj).select2();
    }
  });

  $(".google-fonts-list").on("change", function () {
    var elementRegularWeight = $(this)
      .parent()
      .parent()
      .find(".google-fonts-regularweight-style");
    var selectedFont = $(this).val();
    var customizerControlName = $(this).attr("control-name");

    // Clear Weight/Style dropdowns
    elementRegularWeight.empty();

    // Get the Google Fonts control object
    var bodyfontcontrol = _wpCustomizeSettings.controls[customizerControlName];

    // Find the index of the selected font
    var indexes = $.map(bodyfontcontrol.airifontslist, function (obj, index) {
      if (obj.family === selectedFont) {
        return index;
      }
    });
    var index = indexes[0];

    // For the selected Google font show the available weight/style variants
    $.each(bodyfontcontrol.airifontslist[index].variants, function (val, text) {
      elementRegularWeight.append($("<option></option>").val(text).html(text));
    });

    if (
      $.inArray("regular", bodyfontcontrol.airifontslist[index].variants) !== -1
    ) {
      elementRegularWeight.val("regular");
    }

    // Update the font category based on the selected font
    $(this)
      .parent()
      .parent()
      .find(".google-fonts-category")
      .val(bodyfontcontrol.airifontslist[index].category);

    airiGetAllSelects($(this).parent().parent());
  });

  $(".google_fonts_select_control select").on("change", function () {
    airiGetAllSelects($(this).parent().parent());
  });

  function airiGetAllSelects($element) {
    var selectedFont = {
      font: $element.find(".google-fonts-list").val(),
      variant: $element.find(".google-fonts-regularweight-style").val(),
      category: $element.find(".google-fonts-category").val(),
    };

    // Important! Make sure to trigger change event so Customizer knows it has to save the field
    $element
      .find(".customize-control-google-font-selection")
      .val(JSON.stringify(selectedFont))
      .trigger("change");
  }

  /**
   * Sortable Repeater Custom Control
   */

  // Update the values for all our input fields and initialise the sortable repeater
  $(".sortable_repeater_control").each(function () {
    // If there is an existing customizer value, populate our rows
    var defaultValuesArray = $(this)
      .find(".customize-control-sortable-repeater")
      .val()
      .split(",");
    var numRepeaterItems = defaultValuesArray.length;

    if (numRepeaterItems > 0) {
      // Add the first item to our existing input field
      $(this).find(".repeater-input").val(defaultValuesArray[0]);
      // Create a new row for each new value
      if (numRepeaterItems > 1) {
        var i;
        for (i = 1; i < numRepeaterItems; ++i) {
          airiAppendRow($(this), defaultValuesArray[i]);
        }
      }
    }
  });

  // Make our Repeater fields sortable
  $(this)
    .find(".sortable_repeater.sortable")
    .sortable({
      update: function (event, ui) {
        airiGetAllInputs($(this).parent());
      },
    });

  // Remove item starting from it's parent element
  $(".sortable_repeater.sortable").on(
    "click",
    ".customize-control-sortable-repeater-delete",
    function (event) {
      event.preventDefault();
      var numItems = $(this).parent().parent().find(".repeater").length;

      if (numItems > 1) {
        $(this)
          .parent()
          .slideUp("fast", function () {
            var parentContainer = $(this).parent().parent();
            $(this).remove();
            airiGetAllInputs(parentContainer);
          });
      } else {
        $(this).parent().find(".repeater-input").val("");
        airiGetAllInputs($(this).parent().parent().parent());
      }
    }
  );

  // Add new item
  $(".customize-control-sortable-repeater-add").click(function (event) {
    event.preventDefault();
    airiAppendRow($(this).parent());
    airiGetAllInputs($(this).parent());
  });

  // Refresh our hidden field if any fields change
  $(".sortable_repeater.sortable").change(function () {
    airiGetAllInputs($(this).parent());
  });

  // Add https:// to the start of the URL if it doesn't have it
  $(".sortable_repeater.sortable").on("blur", ".repeater-input", function () {
    var url = $(this);
    var val = url.val();
    if (val && !val.match(/^.+:\/\/.*/)) {
      // Important! Make sure to trigger change event so Customizer knows it has to save the field
      url.val("https://" + val).trigger("change");
    }
  });

  // Append a new row to our list of elements
  function airiAppendRow($element, defaultValue = "") {
    var newRow =
      '<div class="repeater" style="display:none"><input type="text" value="' +
      defaultValue +
      '" class="repeater-input" placeholder="https://" /><span class="dashicons dashicons-sort"></span><a class="customize-control-sortable-repeater-delete" href="#"><span class="dashicons dashicons-no-alt"></span></a></div>';

    $element.find(".sortable").append(newRow);
    $element
      .find(".sortable")
      .find(".repeater:last")
      .slideDown("slow", function () {
        $(this).find("input").focus();
      });
  }

  // Get the values from the repeater input fields and add to our hidden field
  function airiGetAllInputs($element) {
    var inputValues = $element
      .find(".repeater-input")
      .map(function () {
        return $(this).val();
      })
      .toArray();
    // Add all the values from our repeater fields to the hidden field (which is the one that actually gets saved)
    $element.find(".customize-control-sortable-repeater").val(inputValues);
    // Important! Make sure to trigger change event so Customizer knows it has to save the field
    $element.find(".customize-control-sortable-repeater").trigger("change");
  }
});
