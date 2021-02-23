$(function(){
      var slider = new BeaverSlider({
        structure: {
          container: {
            id: "slideOne",
            width: 1000,
            height: 250,
          }
        },
        content: {
          images: [
			"image/pic1.jpg",
            "image/pic2.jpg",
            "image/pic3.jpg",
            "image/pic4.jpg",
            "image/pic5.jpg",
            "image/pic6.jpg",
            "image/pic7.jpg",
          ]
		  
        },
        animation: {
          effects: effectSets["slider: big set 2"],
          interval: 1000
        }
      });   
	});