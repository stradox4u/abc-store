window.onload = function () {
  addToCartFormListener();
  showCartPill();
}

const cartBadge = document.getElementById('cart_badge');
function addToCartFormListener() {
  const forms = document.getElementsByClassName('product-form');
  const formsArray = Array.from(forms);
  formsArray.forEach(function (form) {
    form.addEventListener('submit', async function (event) {
      event.preventDefault()
      const response = await addProductToCart(form.prodId.value, form.quantity.value, form.userId.value);

      const cartCount = response.length;

      cartBadge.innerText = cartCount;
      showCartPill();
    });
  });
}

async function addProductToCart(id, qty, userId) {
  const data =
  {
    prodId: id,
    prodQty: qty,
    userId: userId
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
  return response.json();
}

function showCartPill() {
  if (cartBadge.innerText === '0') {
    cartBadge.classList.add('invisible');
  } else {
    cartBadge.classList.remove('invisible');
  }
}