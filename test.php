<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<select id="v_type" size="1" name="vehicle_type" class="form-control input" required>
  <option value="" selected="selected">Select Vehicle</option>
</select>
<br>
<br>
<select id="brand" size="1" name="brand" class="form-control input" required>
  <option value="" selected="selected">Select Brand</option>
</select>
<br>
<br>
<select id="model" size="1" name="modal" class="form-control input" required>
  <option value="">Select Modal</option>
</select>    
</body>
</html>
<script>
    var stateObject = {
  "Three Wheelers": {
    "Bajaj": ["Bajaj RE CNG", "Bajaj Diesel"],
    "Atul": ["Piaggo", "Shakti"]
  },
  "Two Wheelers": {
    "Hero": ["Splendor", "CBZ"],
    "Honda": ["Hornet", "CBR"],
  },
  "Car": {
    "Suzuki": ["Swift", "Ciaz", "Baleno", "Dzire", "Brezaa", "Ertiga", "Celerio", "Eco", "Omni", "Alto", "Scross", "Ignis", "WagonR"],
    "Hyundai": ["i20", "i10", "Creat", "Eon", "Xcent", "Santro", "Tucson", "Elatrna"],
    "Volkswagon": ["Jetta", "Polo", "Passata", "Polo", "Tiguan", "Ameo"],
    "Nissan": ["Terrano", "Duster", "Micra", "Sunny"],
    "Honda": ["City", "Verna", "CR-V", "Accord", "BR-V", "Brio", "Amaze", "Jazz"],
    "Ford": ["EcoSports", "Endaviour", "Figo", "Freestyle", "Aspire"],
  }

}
window.onload = function() {
  var v_type = document.getElementById("v_type"),
    brand = document.getElementById("brand"),
    model = document.getElementById("model");
  for (var state in stateObject) {
    v_type.options[v_type.options.length] = new Option(state, state);
  }
  v_type.onchange = function() {
    brand.length = 1; // remove all options bar first
    model.length = 1; // remove all options bar first
    if (this.selectedIndex < 1) {
      brand.options[0].text = "Select Brand"
      model.options[0].text = "Select Modal"
      return; // done   
    }
    brand.options[0].text = "Select Brand"
    for (var county in stateObject[this.value]) {
      brand.options[brand.options.length] = new Option(county, county);
    }
    if (brand.options.length == 2) {
      brand.selectedIndex = 1;
      brand.onchange();
    }

  }
  v_type.onchange(); // reset in case page is reloaded
  brand.onchange = function() {
    model.length = 1; // remove all options bar first
    if (this.selectedIndex < 1) {
      model.options[0].text = "Please Modal"
      return; // done   
    }
    model.options[0].text = "Please Modal"

    var cities = stateObject[v_type.value][this.value];
    for (var i = 0; i < cities.length; i++) {
      model.options[model.options.length] = new Option(cities[i], cities[i]);
    }
    if (model.options.length == 2) {
      model.selectedIndex = 1;
      model.onchange();
    }

  }
}
</script>
