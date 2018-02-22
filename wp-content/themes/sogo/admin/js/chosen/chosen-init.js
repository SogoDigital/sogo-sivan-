/**
 * Created by Oren on 7/10/2015.
 */
(function($){
  $(document).ready(function(){
    $('.chosen-rtl').chosen({width: "95%",disable_search_threshold: 5  });
  });

  $('.cmb2_select').live('change', function(){
    $.ajax(
      {url: ajaxurl,
        data: {
          action: 'get_term_children',
          parent: $(this).val()
        },
        success: function(data) {
          // Set up options and name to value for this returned set.
          var values = $.parseJSON(data);
          options = [];
          nameToValue = [];
          for (optionI in values) {
            var option = values[optionI];
            options.push(option.name);
            nameToValue[option.name] = option.value;
          }
          response(options);
        }
      });

  });

})(jQuery);