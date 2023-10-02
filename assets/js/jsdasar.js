// 1. Code Structure
console.log("Muhammad Akmal Ryandi");

// 2. Variables
var nama = 'Akmal';
let age = 21;
const jk = 'Laki-laki';

console.log("Nama :",nama,"|", "Umur :", age, "|", "Jenis Kelamin :", jk);

// 3. Data Types
    // number
    let num = 90;
    console.log("number :",num);

    //BigInt
    const bigInt = 900719925474049832048032984920384991n;
    console.log("BigInt :",bigInt);

    //String
    let negara = 'Indonesia';
    console.log(negara);

    //Boolean
    let boolean = 4 > 5;
    console.log(boolean);

    //Null
    let jadwal = null
    console.log(jadwal);

    //Undefined
    let hewan;
    console.log("naga :",hewan);

    //Symbol
    let Pegawai = Symbol('ryan');
    console.log(Pegawai);
    console.log("Nama Pegawai :",Pegawai.description);

    //Object
    let mahasiswa = {
        nama: "Ryandi",
        umur: 21,
        semester: 7
    };
    console.log(mahasiswa);
    console.log("Semester :", mahasiswa.semester);

// 4. Type Conversion
    // String Conversion
    var angka = 25;
    var stringAngka = String(angka);
    console.log(stringAngka);

    // Numeric Conversion
    var stringAngka = "25";
    var angka = Number(stringAngka);
    console.log(angka);

    // Boolean Conversion
    var angka = 25;
    var booleanAngka = Boolean(angka);
    console.log(booleanAngka);

// 5. Operators
    // Aritmatika
    let aritA = 10
    let aritB = 2
    console.log("10+2=",aritA+aritB); console.log("10-2=",aritA-aritB); console.log("10x2=",aritA*aritB); 
    console.log("10:2=",aritA/aritB); console.log("10%2=",aritA%aritB); console.log("10^2=",aritA**aritB);

    // Assignment
    let assigA = 10
    console.log(assigA);

    assigA+=2
    console.log("10+2=",assigA);

    // Relasi/Perbandingan
    let banding = 4 < 5;
    console.log(banding);

    // Logika
    let logika1 = true;
    let logika2 = false;
      console.log(logika1 || logika2);
      console.log(logika1 && logika2);
      console.log(logika1 != logika2);
      
    // Bitwise
    let angka1 = 5;  
    let angka2 = 3;   
    let hasilAND = angka1 & angka2;
    let hasilOR = angka1 | angka2;
    let hasilXOR = angka1 ^ angka2;
    let hasilNOT = ~angka;
    console.log(hasilAND, hasilOR, hasilXOR, hasilNOT);

    // Ternary
    let ternary1 = 2;
    let ternary2 = 1;
    console.log(ternary1 == ternary2 ? "Yes" : "No");

// 6. Popup Modal
    // Alert
    alert("Haloo selamat datang, saya Akmal");

    // Prompt
    let jawaban = prompt("Apakah Anda Robot?");
    alert("Jawab :"+ jawaban);

    // Confirm
    let konfirmasi = confirm("yang bener?");
    alert("Jawaban nya :"+konfirmasi)

// 7. Conditionals
    // If
    let bola = true
    let gawang = true
    if (bola == gawang) {
        console.log("GOAL");
    }

    // Else
    let jam = 10;
    let weekend = false;
      if (jam > 7 || jam < 18 || weekend) {
        console.log("Kantor Buka");
      } else {
        console.log("Kantor Tutup");
      }

    // Else if
    let role = "pegawai";
      let datang = 8;
      let jamTelat = 9;
      let tidakMasuk = true;

      if (role === "pegawai") {
        if (datang == tidakMasuk) {
          console.log("libur");
        } else if (datang >= jamTelat) {
          console.log("Terlambat");
        } else {
          console.log("Tepat Waktu");
        }
      } else if (role === "guest") {
        console.log("Anda adalah tamu");
      } else {
        console.log("Role tidak valid.");
      }

    // Switch Statement
    switch (new Date().getDay()) {
        case 6:
          console.log("Weekend");
          break;
        case 0:
          console.log("Weekend");
          break;

        default:
          console.log("Kerja");
          break;
      }

// 8. Loops
    // For
    for (let i = 0; i < 3; i ++) {
        console.log("for :",i);
    }

    // Do While
    let i = 0
      do {
          console.log("Do while :",i);
          i++
      } while (i<3);

    //While
    let n = 0
      while (n < 3) {
          console.log("While :",n);
          n ++
      }

    // Break
    for (let a = 0; a <= 3; a++) {
        if (a==2) {
            break;
        }
        console.log("Break :",a);
    }

    // Continue
    for (let c = 0; c <= 3; c++) {
        if (c==2) {
            continue;
        }
        console.log("continue :",c);
    }

// 9. Functions
function makeUser(name, age) {return { name, age };}
  let user = makeUser("Akmal", 21);
  console.log(user.age);