var tooltip = new Drooltip({
       "element" : ".myTooltip",
       "trigger" : "hover",
       "position" : "top",
       "background" : "#4c4c4c",
       "color" : "#fff",
       "animation": "bounce",
       "content" : null,
       "callback" : null
  });

function confirm_delete(node) {
    return confirm("Please click on OK to delete.");
}