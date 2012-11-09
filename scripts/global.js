(function($, window, document, undefined){
  $(function(){

    // Add player
    $('#add-player').submit(function(evt){
      var $name = $('#player-name');
      var $nameList = $('#player-list');
      var uid = gameWrapper.game.playerIndex + 1;
      gameWrapper.game.playerIndex = uid;

      playerHTML  = '<li id="player-uid-' + uid + '">';
      playerHTML += '  <label><input type="radio" name="player" value="' + uid + '" />' + $name.val() + '</label>';
      playerHTML += '  <span class="squares-used">0</span>';
      playerHTML += '  <a href="javascript:;" class="remove-player">remove</a>';
      playerHTML += '</li>';

      $nameList.append(playerHTML);

      gameWrapper.game.players[uid] = {
        'uid':uid,
        'name':$name.val()
      };
      saveGames();

      $name.val('');
      evt.preventDefault();
    });

    $('#player-list').on('change', 'input', function(){
      $(this).parent().addClass('selected');
      $('#player-list input:not(:checked)').parent().removeClass('selected');
    });

    $('td.cell').click(function(){
      $this = $(this);
      player = $('#player-list input:checked').val();

      $this.text(player);

      var objPath = $this.attr('data-obj-path').split('.');

      var obj = gameWrapper;
      for(i in objPath) {
        var o = obj[objPath[i]];

        if (o == undefined){
          obj[objPath[i]] = {};
          o = obj[objPath[i]];
        }
        if (i != objPath.length-1){
          obj = o;
        }
      }

      obj[objPath[i]] = $this.text();

      saveGames();
    });


	// Games
	var gameWrapper = {
		game : null,
		activeGame : localStorage.activeGame = localStorage.activeGame ? 0 : localStorage.activeGame,
		games : localStorage.games ? $.parseJSON(localStorage.games) : false,
		default_game : {
			title : '',
			unitPrice : 1.00,
			teams : {},
			scores : {},
			players : {},
      playerIndex : 0,
			grid : {}
		}
	};

	function loadGame(gameId) {
		gameWrapper.game = gameWrapper.games[gameId];

    $('input[data-obj-path]').each(function(){
      var $this = $(this);
      var objPath = $this.attr('data-obj-path').split('.');

      var obj = gameWrapper;
      for(i in objPath) {
        if(obj == undefined) continue;
        var o = obj[objPath[i]];

        /*if (o == undefined){
          obj[objPath[i]] = {};
          o = obj[objPath[i]];
        }*/
        //if (i != objPath.length-1){
          obj = o;
        //}
      }

      $this.val(obj);
    });

		$('td[data-obj-path]').each(function(){
			var $this = $(this);
			var objPath = $this.attr('data-obj-path').split('.');

			var obj = gameWrapper;
			for(i in objPath) {
        if(obj == undefined) continue;
				var o = obj[objPath[i]];

				/*if (o == undefined){
					obj[objPath[i]] = {};
					o = obj[objPath[i]];
				}*/
				//if (i != objPath.length-1){
					obj = o;
				//}
			}

			$this.text(obj);
		});

    loadPlayers();
	}

  function loadPlayers() {
    $('#player-list').append(function(){
      var obj = gameWrapper.game.players;
      var playerHTML = '';
      for(i in obj) {
        console.log(obj, i)
        if(obj == undefined) continue;
        var o = obj[i];
        // obj = o;

        playerHTML += '<li id="player-index-' + o.uid + '">';
        playerHTML += '  <label><input type="radio" name="player" value="' + o.uid + '" />' + o.name + '</label>';
        playerHTML += '  <span class="squares-used">0</span>';
        playerHTML += '  <a href="javascript:;" class="remove-player">remove</a>';
        playerHTML += '</li>';
      }

      return playerHTML;
    });
  }

	function saveGames() {
		gameWrapper.games[gameWrapper.activeGame] = gameWrapper.game;
		localStorage.games = JSON.stringify(gameWrapper.games);
		console.log(gameWrapper);
	}

	if (!gameWrapper.games) {
		gameWrapper.games = [gameWrapper.default_game];
		saveGames();
	}

	$('[data-obj-path]').on('change', function(evt){
		var $this = $(this);
		var objPath = $this.attr('data-obj-path').split('.');

		var obj = gameWrapper;
		for(i in objPath) {
			var o = obj[objPath[i]];

			if (o == undefined){
				obj[objPath[i]] = {};
				o = obj[objPath[i]];
			}
			if (i != objPath.length-1){
				obj = o;
			}
		}

		obj[objPath[i]] = $this.val();

		saveGames();

		evt.preventDefault();
	});

	loadGame(gameWrapper.activeGame);

  });
})(jQuery, window, document);