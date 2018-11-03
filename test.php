<?php
include('test2.php');

$democrats_agree = 30;
$democrats_disagree = 100 - $democrats_agree;
$republicans_agree = 80;
$republicans_disagree = 100 - $republicans_agree;
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <h1>test graph</h1>
  <div id="testGraph"></div>
</body>
<script src="script/d3.js"></script>
<script>
let SHOULD_DRAW_GRAPH = true;

let democrats = {
  agree: <?php echo $democrats_agree ?>,
  disagree: null
};
let republicans = {
  agree: <?php echo $republicans_agree ?>,
  disagree: null
};

console.log('dems: ', democrats);
console.log('reps: ', republicans);

// If num is between 95, 100 --> Randomly assign.
democrats = maybeReassign(democrats);
republicans = maybeReassign(republicans);

// TODO: Do conditional check to see if should draw graph (in some cases,
// should be blank).

// Setting up SVG details.
let margin = {top: 20, right: 20, bottom: 20, left: 20};
let width = 400 - margin.left - margin.right;
let height = 400 - margin.top - margin.bottom;

const svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform",
          "translate(" + margin.left + "," + margin.top + ")");
// TODO: Add more details.
// Modeled off http://bl.ocks.org/d3noob/8952219

function maybeReassign(val) {
  if (val >= 95) return getRandomIntInclusive_(95, 99);
  else return val;
}

function getRandomIntInclusive_(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min; //The maximum is inclusive and the minimum is inclusive
}

</script>
</html>
