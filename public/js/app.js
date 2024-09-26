let filterProduct = document.getElementById("filter_product_id")
if(filterProduct){
   filterProduct.addEventListener("change", function(){
      let productId = this.value || this.options[this.selectedIndex].value;
      window.location.href =
         window.location.href.split("?")[0] + "?product_id=" + productId;
  });
}


document.querySelectorAll(".btn-delete").forEach((button) => {
button.addEventListener("click", function(event){
   event.preventDefault();
   if(confirm("Are you sure?")){
      let action = this.getAttribute("href");
      let form = document.getElementById("form-delete");
      form.setAttribute("action", action);
      form.submit();
   }
});});


let btnClear = document.getElementById("btn-clear")
if(btnClear){
   btnClear.addEventListener("click", () => {
      let input = document.getElementById("search"),
         select = document.getElementById("filter_product_id");

      if(input) input.value = ""
      if(select) select.selectedIndex = 0

      window.location.href = window.location.href.split("?")[0];
  });
}


const toggleClearButton = () => {
   let query = location.search,
      pattern = /[?&]search=/,
      button = document.getElementById("btn-clear");

   if(button == undefined) return;
   if(pattern.test(query)){
      button.style.display = "block";
   }else{
      button.style.display = "none";
   }
};
toggleClearButton();