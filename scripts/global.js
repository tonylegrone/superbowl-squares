(function($, window, document, undefined){
  $(function(){

    // Add player
    $('#add-player').submit(function(evt){
      var $name = $('#player-name');
      var $nameList = $('#player-list');
      var index = $nameList.children().length;

      $nameList.append('<li><label><input type="radio" name="player" value="' + index + '" />' + $name.val() + '</label></li>');
      $name.val('');
      evt.preventDefault();
    });

  });
})(jQuery, window, document);