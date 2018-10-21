
var countryStateInfo = {

		"Luanda": ["Launda", "Belas", "Cazenga", "Viana", "Muxima", "Icolo e Bengo"],
		"Kwanza Norte": ["Cambambe", "Cazengo", "Gulongo Alto", "Lucala"],
		"Malange": ["Malange", "Cacuso", "Bolongongo", "Alto Hama", "Caala"]
}


window.onload = function () {
	
	//Get html elements
	var countySel = document.getElementById("countySel");
	var stateSel = document.getElementById("stateSel");	
	
	//Load countries
	for (var country in countryStateInfo) {
		countySel.options[countySel.options.length] = new Option(country, country);
	}
	
	//County Changed
	countySel.onchange = function () {
		 
		 stateSel.length = 1; // remove all options bar first
		 
		 if (this.selectedIndex < 1)
			 return; // done

		var zips = countryStateInfo[this.value];
		for (var i = 0; i < zips.length; i++) {
			stateSel.options[stateSel.options.length] = new Option(zips[i], zips[i]);

		}
	}
}