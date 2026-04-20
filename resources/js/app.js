import './bootstrap';

const openModal = document.getElementById('OpenModal');
const closeModal = document.getElementById('closeModal');
const modal = document.getElementById('productModal');
const saveProduct = document.getElementById('saveProduct');
const productList = document.getElementById('product-list');

openModal.addEventListener('click', () => {
    modal.classList.remove('hidden');
    modal.classList.add('flex');
});

closeModal.addEventListener('click', () => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
});

saveProduct.addEventListener('click', () => {
    const name = document.getElementById('productName').value.trim();

    if (!name) return;

    // Create product element
    const item = document.createElement('div');
    item.className = "p-4 border-b";
    item.textContent = name;

    // Add to list
    productList.appendChild(item);

    // Clear modal
    document.getElementById('productName').value = "";

    // Hide modal
    modal.classList.add('hidden');
    modal.classList.remove('flex');
});
