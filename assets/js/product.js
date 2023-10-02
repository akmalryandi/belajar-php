// Array produk dengan informasi
let products = [
    {
        name: "LEGO Batman",
        imageSrc: "../assets/images/produk/bat.png",
        description: "Super Heroes DC 76224 Batmobile: Batman vs. The Joker Chase"
    },
    {
        name: "LEGO Star Wars",
        imageSrc: "../assets/images/produk/star.png",
        description: "Star Wars 75364 New Republic E-Wing vs. Shin Hati’s Starfighter"
    },
    {
        name: "LEGO Captain America’s",
        imageSrc: "../assets/images/produk/cap.png",
        description: "Super Heroes Marvel 76262 Captain America’s Shield Building Kit"
    },
    {
        name: "LEGO Ninjago",
        imageSrc: "../assets/images/produk/ninja.png",
        description: "NINJAGO 71789 Kai and Ras’s Car and Bike Battle Building Toy Set"
    },
    {
        name: "LEGO Harry Potter",
        imageSrc: "../assets/images/produk/harry.png",
        description: "LEGO Harry Potter 76416 Quidditch Trunk Building Toy Set"
    },
    {
        name: "LEGO Minecraft",
        imageSrc: "../assets/images/produk/mine.png",
        description: "Minecraft 21250 The Iron Golem Fortress Building Toy Set"
    }
  ];
  
  // Dapatkan elemen kontainer produk menggunakan id
  let productContainer = document.getElementById("productContainer");
  
  // Loop melalui array produk dan buat elemen untuk setiap produk
  for (let i = 0; i < products.length; i++) {
    let product = products[i];
  
    // Buat elemen div untuk setiap produk
    let productDiv = document.createElement("div");
    productDiv.classList.add("box");
  
    // Tambahkan gambar produk
    let productImage = document.createElement("img");
    productImage.src = product.imageSrc;
    productDiv.appendChild(productImage);
  
    // Tambahkan nama produk
    let productName = document.createElement("h3");
    productName.textContent = product.name;
    productDiv.appendChild(productName);
  
    // Tambahkan deskripsi produk
    let productDescription = document.createElement("p");
    productDescription.textContent = product.description;
    productDiv.appendChild(productDescription);
  
    // Tambahkan tombol "Buy"
    let buyButton = document.createElement("a");
    buyButton.href = "#";
    buyButton.textContent = "Buy";
    buyButton.classList.add("btn");
    productDiv.appendChild(buyButton);
  
    // Tambahkan elemen produk ke dalam kontainer produk
    productContainer.appendChild(productDiv);
  }
  