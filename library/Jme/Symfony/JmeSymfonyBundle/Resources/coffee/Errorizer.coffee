window.Jme = window.Jme || {}

class Jme.Errorizer

    constructor: (@$element) ->
        
    errorize: (message) ->
       
        $container = $('<div class="errorizer"></div>')
        
        for key, values of message.errors
            @render key, values, $container
            
    clear: ->
        @$element.empty()
    
       
    render: (label, errors, $container) ->
        
  
        $label = $('<p class="title"></p>').html label + ":"
        $ul = $('<ul></ul>')
        
        $ul.append $('<li></li>').html(error) for error in errors
        
        $container.append $label
        $container.append $ul
        
        @$element.append $container
        
        