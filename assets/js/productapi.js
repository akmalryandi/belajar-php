async function fetchProducts() {

  fetch("https://650fd7363ce5d181df5cb20b.mockapi.io/produk")
    .then((response) => response.json())
    .then((data) => {
      let productContainer = document.getElementById("product-container");
      data.forEach((product) => {
        let productBox = document.createElement("div");
        productBox.classList.add("box");

        let productImage = document.createElement("img");
        productImage.src = product.image;

        let productName = document.createElement("h3");
        productName.textContent = product.name;

        let productDescription = document.createElement("p");
        productDescription.textContent = product.description;

        let buyButton = document.createElement("a");
        buyButton.href = "#";
        buyButton.classList.add("btn");
        buyButton.textContent = "Buy";

        productBox.appendChild(productImage);
        productBox.appendChild(productName);
        productBox.appendChild(productDescription);
        productBox.appendChild(buyButton);

        productContainer.appendChild(productBox);
      });
    })
    .catch((error) => {
      console.error("Terjadi kesalahan dalam mengambil data Anda:", error);
    });
}

fetchProducts();