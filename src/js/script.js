window.onload = function () {
  console.log('Hello from Javascript');
  addToCartFormListener();
}

function addToCartFormListener() {
  const forms = document.getElementsByClassName('product-form');
  const formsArray = Array.from(forms);
  formsArray.forEach(function (form) {
    form.addEventListener('submit', function (event) {
      event.preventDefault()
      const response = addProductToCart(form.prodId.value, form.quantity.value);
    });
  });
  // console.log(form.quantity.value)
  // console.log(form.prodId.value)

}

async function addProductToCart(id, qty) {
  const data =
  {
    prodId: id,
    prodQty: qty
  };
  const response = await fetch('http://localhost:8000/api/cart',
    {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(data)
    });
  console.log(response.text());
}