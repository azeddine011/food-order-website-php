  // vars
  let result = document.querySelector(".result"),
    img_result = document.querySelector(".img-result"),
    // img_w = document.querySelector(".img-w"),
    img_h = document.querySelector(".img-h"),
    // options = document.querySelector(".options"),
    save = document.querySelector(".btn-save"),
    cropped = document.querySelector(".cropped"),
    // dwn = document.querySelector(".download"),
    upload = document.querySelector("#file-input"),
    trash_can = document.querySelector(".upload-trash-icon"),
    cropper = "";

  // on change show image with crop options
  upload.addEventListener("change", (e) => {
    if (e.target.files.length) {
      // start file reader
      const reader = new FileReader();
      reader.onload = (e) => {
        if (e.target.result) {
          // create new image
          let img = document.createElement("img");
          img.id = "image";
          img.src = e.target.result;
          // clean result before
          result.innerHTML = "";
          // append new image
          result.classList.add("result-style");
          result.appendChild(img);
          // show save btn and result div
          result.parentElement.classList.remove('hide');
          save.classList.remove("hide");
        //   options.classList.remove("hide");
          // init cropper
          cropper = new Cropper(img);
        }
      };
      reader.readAsDataURL(e.target.files[0]);
    }
  });

  // save on click
  save.addEventListener("click", (e) => {
    e.preventDefault();
    // get result to data uri
    let imgSrc = cropper
      .getCroppedCanvas({
        width: 300, // input value
      })
      .toDataURL();
    // remove hide class of img
    cropped.classList.remove("hide");
    img_result.classList.remove("hide");
    // show image cropped
    cropped.src = imgSrc;
    // hide result div
    result.parentElement.classList.add('hide');
    save.classList.add("hide");
    trash_can.classList.remove("hide");
  });
  // trash-can click
  trash_can.addEventListener("click",()=>{
    upload.value="";
    img_result.classList.add("hide");
    trash_can.classList.add("hide");
  });