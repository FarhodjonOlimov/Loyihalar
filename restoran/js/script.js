// Mahsulotlar ma'lumotlari
const products = [
    {
        id: 1,
        name: "Osh",
        category: "osh",
        price: 25000,
        image: "https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1081&q=80",
        description: "An'anaviy osh - go'sht, sabzi, piyoz va maxsus ziravorlar bilan tayyorlanadi.",
        ingredients: ["Guruch", "Go'sht", "Sabzi", "Piyoz", "Ziravorlar"],
        popular: true
    },
    {
        id: 2,
        name: "Qozon Kabob",
        category: "kabob",
        price: 32000,
        image: "https://images.unsplash.com/photo-1546833999-b9f581a1996d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80",
        description: "Qo'y go'shtidan tayyorlangan, maxsus ziravorlar bilan marinadlangan kabob.",
        ingredients: ["Qo'y go'shti", "Piyoz", "Ziravorlar", "Limon"],
        popular: true
    },
    {
        id: 3,
        name: "Chuchvara",
        category: "shoʻrva",
        price: 18000,
        image: "https://images.unsplash.com/photo-1563245372-f21724e3856d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
        description: "Xamir va qiyma go'shtdan tayyorlangan, issiq sho'rva bilan xizmat qilamiz.",
        ingredients: ["Xamir", "Qiyma go'sht", "Piyoz", "Sho'rva", "Ziravorlar"],
        popular: false
    },
    {
        id: 4,
        name: "Achichuk",
        category: "salad",
        price: 12000,
        image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
        description: "Pomidor, bodring va piyozdan tayyorlangan an'anaviy o'zbek salati.",
        ingredients: ["Pomidor", "Bodring", "Piyoz", "Zaytun moyi", "Ziravorlar"],
        popular: true
    },
    {
        id: 5,
        name: "Mastava",
        category: "shoʻrva",
        price: 16000,
        image: "https://images.unsplash.com/photo-1476718406336-bb5a9690ee2a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80",
        description: "Guruch, go'sht va sabzavotlardan tayyorlangan quyuq sho'rva.",
        ingredients: ["Guruch", "Go'sht", "Sabzi", "Kartoshka", "Ziravorlar"],
        popular: false
    },
    {
        id: 6,
        name: "Shashlik",
        category: "kabob",
        price: 28000,
        image: "https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80",
        description: "Mol go'shtidan tayyorlangan, yog'da pishirilgan shashlik.",
        ingredients: ["Mol go'shti", "Piyoz", "Ziravorlar", "Limon"],
        popular: true
    },
    {
        id: 7,
        name: "Norin",
        category: "osh",
        price: 22000,
        image: "https://images.unsplash.com/photo-1563379091339-03246963d8d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
        description: "Xamir va qaynatilgan go'shtdan tayyorlangan an'anaviy taom.",
        ingredients: ["Xamir", "Go'sht", "Piyoz", "Ziravorlar"],
        popular: false
    },
    {
        id: 8,
        name: "Manti",
        category: "osh",
        price: 20000,
        image: "https://images.unsplash.com/photo-1563245372-f21724e3856d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
        description: "Xamir va qiyma go'shtdan tayyorlangan, bug'da pishirilgan taom.",
        ingredients: ["Xamir", "Qiyma go'sht", "Piyoz", "Ziravorlar"],
        popular: true
    },
    {
        id: 9,
        name: "Somsa",
        category: "osh",
        price: 8000,
        image: "https://images.unsplash.com/photo-1603539965943-74b8bc8cebb9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80",
        description: "Xamir va qiyma go'shtdan tayyorlangan, tandirda pishirilgan somsa.",
        ingredients: ["Xamir", "Qiyma go'sht", "Piyoz", "Ziravorlar"],
        popular: true
    },
    {
        id: 10,
        name: "Choy",
        category: "ichimlik",
        price: 3000,
        image: "https://images.unsplash.com/photo-1556679343-c7306c1976bc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80",
        description: "An'anaviy o'zbek ko'k choyi.",
        ingredients: ["Choy", "Limon", "Qand"],
        popular: false
    },
    {
        id: 11,
        name: "Kompot",
        category: "ichimlik",
        price: 5000,
        image: "https://images.unsplash.com/photo-1544145945-f90425340c7e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80",
        description: "Mevalardan tayyorlangan sovuq kompot.",
        ingredients: ["Olma", "Nok", "O'rik", "Qand"],
        popular: false
    },
    {
        id: 12,
        name: "Halva",
        category: "desert",
        price: 10000,
        image: "https://images.unsplash.com/photo-1586201375761-83865001e31c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
        description: "An'anaviy shirinlik - un, yog' va shirdan tayyorlanadi.",
        ingredients: ["Un", "Yog'", "Shakar", "Yong'oq"],
        popular: false
    }
];

// Global o'zgaruvchilar
let cart = [];
let currentUser = null;
let currentCategory = 'all';
let currentSearchTerm = '';

// DOM elementlari
const DOM = {
    // Modal elementlari
    authModal: document.getElementById('auth-modal'),
    productModal: document.getElementById('product-modal'),
    cartModal: document.getElementById('cart-modal'),
    
    // Formalar
    loginForm: document.getElementById('login-form'),
    registerForm: document.getElementById('register-form'),
    reservationForm: document.getElementById('reservation-form'),
    contactForm: document.getElementById('contact-form'),
    
    // Mahsulotlar konteyneri
    productsContainer: document.getElementById('products-container'),
    
    // Savat elementlari
    cartItems: document.getElementById('cart-items'),
    cartTotalPrice: document.getElementById('cart-total-price'),
    cartCount: document.querySelector('.cart-count'),
    
    // Qidiruv elementlari
    searchInput: document.getElementById('search-input'),
    mainSearch: document.getElementById('main-search'),
    searchBtn: document.getElementById('search-btn'),
    mainSearchBtn: document.getElementById('main-search-btn'),
    filterBtns: document.querySelectorAll('.filter-btn'),
    categories: document.querySelectorAll('.category'),
    
    // Auth elementlari
    loginBtn: document.getElementById('login-btn'),
    registerBtn: document.getElementById('register-btn'),
    userProfile: document.querySelector('.user-profile'),
    authTabs: document.querySelectorAll('.tab-btn'),
    
    // Boshqa elementlar
    mobileMenuBtn: document.querySelector('.mobile-menu-btn'),
    navMenu: document.querySelector('.nav-menu'),
    closeModalBtns: document.querySelectorAll('.close-modal'),
    viewMenuBtn: document.getElementById('view-menu'),
    orderNowBtn: document.getElementById('order-now'),
    clearCartBtn: document.getElementById('clear-cart'),
    checkoutBtn: document.getElementById('checkout')
};

// Dastur ishga tushganda
document.addEventListener('DOMContentLoaded', initApp);

// Dasturni ishga tushirish
function initApp() {
    // Mahsulotlarni yuklash
    renderProducts(products);
    
    // Event listener'larni qo'shish
    setupEventListeners();
    
    // LocalStorage'dan ma'lumotlarni yuklash
    loadFromLocalStorage();
}

// Event listener'larni sozlash
function setupEventListeners() {
    // Modal yopish
    DOM.closeModalBtns.forEach(btn => {
        btn.addEventListener('click', closeAllModals);
    });
    
    // Modal tashqarisiga bosganda yopish
    window.addEventListener('click', (e) => {
        if (e.target === DOM.authModal) {
            closeAllModals();
        }
        if (e.target === DOM.productModal) {
            closeAllModals();
        }
        if (e.target === DOM.cartModal) {
            closeAllModals();
        }
    });
    
    // Auth modal
    DOM.loginBtn.addEventListener('click', () => openModal(DOM.authModal));
    DOM.registerBtn.addEventListener('click', () => openModal(DOM.authModal));
    
    // Auth tab'lari
    DOM.authTabs.forEach(tab => {
        tab.addEventListener('click', switchAuthTab);
    });
    
    // Formalar
    DOM.loginForm.addEventListener('submit', handleLogin);
    DOM.registerForm.addEventListener('submit', handleRegister);
    DOM.reservationForm.addEventListener('submit', handleReservation);
    DOM.contactForm.addEventListener('submit', handleContact);
    
    // Qidiruv
    DOM.searchBtn.addEventListener('click', handleSearch);
    DOM.mainSearchBtn.addEventListener('click', handleMainSearch);
    DOM.mainSearch.addEventListener('keyup', (e) => {
        if (e.key === 'Enter') {
            handleMainSearch();
        }
    });
    
    // Filtrlar
    DOM.filterBtns.forEach(btn => {
        btn.addEventListener('click', handleFilter);
    });
    
    // Kategoriyalar
    DOM.categories.forEach(category => {
        category.addEventListener('click', handleCategory);
    });
    
    // Mobil menyu
    DOM.mobileMenuBtn.addEventListener('click', toggleMobileMenu);
    
    // Savat
    document.querySelector('.cart-icon').addEventListener('click', () => openModal(DOM.cartModal));
    DOM.clearCartBtn.addEventListener('click', clearCart);
    DOM.checkoutBtn.addEventListener('click', handleCheckout);
    
    // Boshqa tugmalar
    DOM.viewMenuBtn.addEventListener('click', scrollToMenu);
    DOM.orderNowBtn.addEventListener('click', scrollToMenu);
}

// Mahsulotlarni ekranga chiqarish
function renderProducts(productsToRender) {
    DOM.productsContainer.innerHTML = '';
    
    if (productsToRender.length === 0) {
        DOM.productsContainer.innerHTML = `
            <div class="no-products">
                <i class="fas fa-search"></i>
                <h3>Hech qanday mahsulot topilmadi</h3>
                <p>Boshqa qidiruv so'rovi yoki kategoriya tanlang</p>
            </div>
        `;
        return;
    }
    
    productsToRender.forEach(product => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card';
        productCard.innerHTML = `
            <div class="product-image">
                <img src="${product.image}" alt="${product.name}">
                ${product.popular ? '<div class="popular-badge">Mashhur</div>' : ''}
            </div>
            <div class="product-info">
                <span class="product-category">${getCategoryName(product.category)}</span>
                <h3 class="product-name">${product.name}</h3>
                <p class="product-description">${product.description}</p>
                <div class="product-price">${formatPrice(product.price)} so'm</div>
                <div class="product-actions">
                    <button class="add-to-cart" data-id="${product.id}">
                        <i class="fas fa-shopping-cart"></i> Savatga
                    </button>
                </div>
            </div>
        `;
        
        DOM.productsContainer.appendChild(productCard);
    });
    
    // Savatga qo'shish tugmalariga event listener qo'shish
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const productId = parseInt(e.currentTarget.getAttribute('data-id'));
            addToCart(productId);
        });
    });
    
    // Mahsulot kartalariga bosganda modal ochish
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('click', (e) => {
            if (!e.target.closest('.add-to-cart')) {
                const productId = parseInt(card.querySelector('.add-to-cart').getAttribute('data-id'));
                openProductModal(productId);
            }
        });
    });
}

// Mahsulot modalini ochish
function openProductModal(productId) {
    const product = products.find(p => p.id === productId);
    if (!product) return;
    
    const modalContent = document.querySelector('.product-modal-content');
    modalContent.innerHTML = `
        <div class="product-modal-image">
            <img src="${product.image}" alt="${product.name}">
        </div>
        <div class="product-modal-info">
            <h2>${product.name}</h2>
            <span class="product-modal-category">${getCategoryName(product.category)}</span>
            <div class="product-modal-price">${formatPrice(product.price)} so'm</div>
            <p class="product-modal-description">${product.description}</p>
            
            <div class="product-modal-actions">
                <div class="modal-quantity-controls">
                    <button class="modal-quantity-btn decrease"><i class="fas fa-minus"></i></button>
                    <span class="modal-quantity">1</span>
                    <button class="modal-quantity-btn increase"><i class="fas fa-plus"></i></button>
                </div>
                <button class="modal-add-to-cart" data-id="${product.id}">
                    <i class="fas fa-shopping-cart"></i> Savatga qo'shish
                </button>
            </div>
            
            <div class="product-modal-details">
                <h3>Tarkibi</h3>
                <ul>
                    ${product.ingredients.map(ingredient => `<li>${ingredient}</li>`).join('')}
                </ul>
            </div>
        </div>
    `;
    
    // Modal ichidagi miqdor boshqaruvini sozlash
    const decreaseBtn = modalContent.querySelector('.decrease');
    const increaseBtn = modalContent.querySelector('.increase');
    const quantityElement = modalContent.querySelector('.modal-quantity');
    const addToCartBtn = modalContent.querySelector('.modal-add-to-cart');
    
    let quantity = 1;
    
    decreaseBtn.addEventListener('click', () => {
        if (quantity > 1) {
            quantity--;
            quantityElement.textContent = quantity;
        }
    });
    
    increaseBtn.addEventListener('click', () => {
        quantity++;
        quantityElement.textContent = quantity;
    });
    
    addToCartBtn.addEventListener('click', () => {
        addToCart(productId, quantity);
        closeAllModals();
        showNotification(`"${product.name}" savatga qo'shildi!`, 'success');
    });
    
    openModal(DOM.productModal);
}

// Savatni yangilash
function updateCart() {
    DOM.cartItems.innerHTML = '';
    
    if (cart.length === 0) {
        DOM.cartItems.innerHTML = `
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <h3>Savat bo'sh</h3>
                <p>Mahsulot qo'shish uchun menyuga o'ting</p>
            </div>
        `;
        DOM.cartTotalPrice.textContent = '0';
        DOM.cartCount.textContent = '0';
        return;
    }
    
    let totalPrice = 0;
    let totalCount = 0;
    
    cart.forEach(item => {
        const product = products.find(p => p.id === item.id);
        if (!product) return;
        
        const itemTotal = product.price * item.quantity;
        totalPrice += itemTotal;
        totalCount += item.quantity;
        
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <div class="cart-item-image">
                <img src="${product.image}" alt="${product.name}">
            </div>
            <div class="cart-item-info">
                <h4 class="cart-item-name">${product.name}</h4>
                <div class="cart-item-price">${formatPrice(product.price)} so'm</div>
            </div>
            <div class="cart-item-actions">
                <div class="cart-item-quantity">
                    <button class="quantity-btn decrease" data-id="${product.id}"><i class="fas fa-minus"></i></button>
                    <span class="quantity">${item.quantity}</span>
                    <button class="quantity-btn increase" data-id="${product.id}"><i class="fas fa-plus"></i></button>
                </div>
                <button class="cart-item-remove" data-id="${product.id}"><i class="fas fa-trash"></i></button>
            </div>
        `;
        
        DOM.cartItems.appendChild(cartItem);
    });
    
    DOM.cartTotalPrice.textContent = formatPrice(totalPrice);
    DOM.cartCount.textContent = totalCount;
    
    // Savatdagi mahsulotlar miqdorini boshqarish
    document.querySelectorAll('.cart-item .decrease').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const productId = parseInt(e.currentTarget.getAttribute('data-id'));
            updateCartItemQuantity(productId, -1);
        });
    });
    
    document.querySelectorAll('.cart-item .increase').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const productId = parseInt(e.currentTarget.getAttribute('data-id'));
            updateCartItemQuantity(productId, 1);
        });
    });
    
    document.querySelectorAll('.cart-item-remove').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const productId = parseInt(e.currentTarget.getAttribute('data-id'));
            removeFromCart(productId);
        });
    });
    
    // LocalStorage'ga saqlash
    saveToLocalStorage();
}

// Savatga mahsulot qo'shish
function addToCart(productId, quantity = 1) {
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({
            id: productId,
            quantity: quantity
        });
    }
    
    updateCart();
    showNotification('Mahsulot savatga qo\'shildi!', 'success');
}

// Savatdan mahsulot olib tashlash
function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    updateCart();
    showNotification('Mahsulot savatdan olib tashlandi!', 'info');
}

// Savatdagi mahsulot miqdorini yangilash
function updateCartItemQuantity(productId, change) {
    const item = cart.find(item => item.id === productId);
    if (!item) return;
    
    item.quantity += change;
    
    if (item.quantity <= 0) {
        removeFromCart(productId);
    } else {
        updateCart();
    }
}

// Savatni tozalash
function clearCart() {
    cart = [];
    updateCart();
    showNotification('Savat tozalandi!', 'info');
}

// Buyurtma berish
function handleCheckout() {
    if (cart.length === 0) {
        showNotification('Savat bo\'sh!', 'error');
        return;
    }
    
    if (!currentUser) {
        showNotification('Buyurtma berish uchun tizimga kiring!', 'error');
        openModal(DOM.authModal);
        return;
    }
    
    // Bu yerda haqiqiy to'lov tizimiga ulanish kerak
    showNotification('Buyurtma qabul qilindi! Tez orada siz bilan bog\'lanamiz.', 'success');
    closeAllModals();
    cart = [];
    updateCart();
}

// Modal ochish
function openModal(modal) {
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

// Barcha modallarni yopish
function closeAllModals() {
    document.querySelectorAll('.modal').forEach(modal => {
        modal.classList.remove('active');
    });
    document.body.style.overflow = 'auto';
}

// Auth tab'larini almashtirish
function switchAuthTab(e) {
    const tab = e.currentTarget.getAttribute('data-tab');
    
    // Tab tugmalarini yangilash
    DOM.authTabs.forEach(t => t.classList.remove('active'));
    e.currentTarget.classList.add('active');
    
    // Formlarni yangilash
    document.querySelectorAll('.auth-form').forEach(form => {
        form.classList.remove('active');
    });
    
    if (tab === 'login') {
        DOM.loginForm.classList.add('active');
    } else {
        DOM.registerForm.classList.add('active');
    }
}

// Login qilish
function handleLogin(e) {
    e.preventDefault();
    
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    
    // Bu yerda haqiqiy autentifikatsiya logikasi bo'lishi kerak
    if (email && password) {
        currentUser = {
            name: 'Foydalanuvchi',
            email: email
        };
        
        DOM.userProfile.querySelector('.username').textContent = currentUser.name;
        DOM.userProfile.classList.remove('hidden');
        document.querySelector('.auth-buttons').classList.add('hidden');
        
        closeAllModals();
        showNotification('Muvaffaqiyatli kirish!', 'success');
        
        // Formani tozalash
        DOM.loginForm.reset();
    } else {
        showNotification('Iltimos, barcha maydonlarni to\'ldiring!', 'error');
    }
}

// Ro'yxatdan o'tish
function handleRegister(e) {
    e.preventDefault();
    
    const name = document.getElementById('register-name').value;
    const email = document.getElementById('register-email').value;
    const phone = document.getElementById('register-phone').value;
    const password = document.getElementById('register-password').value;
    const confirm = document.getElementById('register-confirm').value;
    
    if (password !== confirm) {
        showNotification('Parollar mos kelmadi!', 'error');
        return;
    }
    
    if (name && email && phone && password) {
        currentUser = {
            name: name,
            email: email,
            phone: phone
        };
        
        DOM.userProfile.querySelector('.username').textContent = currentUser.name;
        DOM.userProfile.classList.remove('hidden');
        document.querySelector('.auth-buttons').classList.add('hidden');
        
        closeAllModals();
        showNotification('Muvaffaqiyatli ro\'yxatdan o\'tildi!', 'success');
        
        // Formani tozalash
        DOM.registerForm.reset();
    } else {
        showNotification('Iltimos, barcha maydonlarni to\'ldiring!', 'error');
    }
}

// Bron qilish
function handleReservation(e) {
    e.preventDefault();
    
    const name = document.getElementById('reservation-name').value;
    const phone = document.getElementById('reservation-phone').value;
    const date = document.getElementById('reservation-date').value;
    const time = document.getElementById('reservation-time').value;
    const guests = document.getElementById('reservation-guests').value;
    const occasion = document.getElementById('reservation-occasion').value;
    const notes = document.getElementById('reservation-notes').value;
    
    if (name && phone && date && time && guests) {
        // Bu yerda haqiqiy bron qilish logikasi bo'lishi kerak
        showNotification('Bron qilish muvaffaqiyatli amalga oshirildi!', 'success');
        DOM.reservationForm.reset();
    } else {
        showNotification('Iltimos, barcha kerakli maydonlarni to\'ldiring!', 'error');
    }
}

// Aloqa formasi
function handleContact(e) {
    e.preventDefault();
    
    const name = document.getElementById('contact-name').value;
    const email = document.getElementById('contact-email').value;
    const subject = document.getElementById('contact-subject').value;
    const message = document.getElementById('contact-message').value;
    
    if (name && email && subject && message) {
        // Bu yerda haqiqiy xabar yuborish logikasi bo'lishi kerak
        showNotification('Xabaringiz yuborildi! Tez orada javob beramiz.', 'success');
        DOM.contactForm.reset();
    } else {
        showNotification('Iltimos, barcha maydonlarni to\'ldiring!', 'error');
    }
}

// Qidiruv
function handleSearch() {
    const searchTerm = DOM.searchInput.value.trim().toLowerCase();
    filterProducts(searchTerm, currentCategory);
}

function handleMainSearch() {
    const searchTerm = DOM.mainSearch.value.trim().toLowerCase();
    filterProducts(searchTerm, currentCategory);
}

// Filtrlash
function handleFilter(e) {
    const category = e.currentTarget.getAttribute('data-category');
    
    // Filtr tugmalarini yangilash
    DOM.filterBtns.forEach(btn => btn.classList.remove('active'));
    e.currentTarget.classList.add('active');
    
    filterProducts(currentSearchTerm, category);
}

// Kategoriya tanlash
function handleCategory(e) {
    const category = e.currentTarget.getAttribute('data-category');
    
    // Kategoriya tugmalarini yangilash
    DOM.categories.forEach(cat => cat.classList.remove('active'));
    e.currentTarget.classList.add('active');
    
    filterProducts(currentSearchTerm, category);
}

// Mahsulotlarni filtrlash
function filterProducts(searchTerm = '', category = 'all') {
    currentSearchTerm = searchTerm;
    currentCategory = category;
    
    let filteredProducts = products;
    
    // Kategoriya bo'yicha filtrlash
    if (category !== 'all') {
        filteredProducts = filteredProducts.filter(product => product.category === category);
    }
    
    // Qidiruv bo'yicha filtrlash
    if (searchTerm) {
        filteredProducts = filteredProducts.filter(product => 
            product.name.toLowerCase().includes(searchTerm) ||
            product.description.toLowerCase().includes(searchTerm) ||
            product.ingredients.some(ingredient => ingredient.toLowerCase().includes(searchTerm))
        );
    }
    
    renderProducts(filteredProducts);
}

// Mobil menyuni ochish/yopish
function toggleMobileMenu() {
    DOM.navMenu.classList.toggle('active');
}

// Menyuga scroll qilish
function scrollToMenu() {
    document.getElementById('menu').scrollIntoView({ behavior: 'smooth' });
}

// Notification ko'rsatish
function showNotification(message, type = 'info') {
    // Mavjud notification'larni olib tashlash
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());
    
    // Yangi notification yaratish
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${getNotificationIcon(type)}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Notification'ni ko'rsatish
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);
    
    // Notification'ni yashirish
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// Notification iconini olish
function getNotificationIcon(type) {
    switch (type) {
        case 'success': return 'check-circle';
        case 'error': return 'exclamation-circle';
        case 'warning': return 'exclamation-triangle';
        default: return 'info-circle';
    }
}

// Kategoriya nomini olish
function getCategoryName(category) {
    const categoryNames = {
        'osh': 'Osh',
        'kabob': 'Kabob',
        'salad': 'Salat',
        'shoʻrva': 'Shoʻrva',
        'desert': 'Desert',
        'ichimlik': 'Ichimlik'
    };
    
    return categoryNames[category] || category;
}

// Narxni formatlash
function formatPrice(price) {
    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

// LocalStorage'dan yuklash
function loadFromLocalStorage() {
    const savedCart = localStorage.getItem('restaurantCart');
    const savedUser = localStorage.getItem('restaurantUser');
    
    if (savedCart) {
        cart = JSON.parse(savedCart);
        updateCart();
    }
    
    if (savedUser) {
        currentUser = JSON.parse(savedUser);
        DOM.userProfile.querySelector('.username').textContent = currentUser.name;
        DOM.userProfile.classList.remove('hidden');
        document.querySelector('.auth-buttons').classList.add('hidden');
    }
}

// LocalStorage'ga saqlash
function saveToLocalStorage() {
    localStorage.setItem('restaurantCart', JSON.stringify(cart));
    
    if (currentUser) {
        localStorage.setItem('restaurantUser', JSON.stringify(currentUser));
    }
}

// Notification uchun CSS qo'shish
const notificationStyles = document.createElement('style');
notificationStyles.textContent = `
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 3000;
        transform: translateX(400px);
        transition: transform 0.3s ease;
        border-left: 4px solid #3498db;
        max-width: 350px;
    }
    
    .notification.show {
        transform: translateX(0);
    }
    
    .notification.success {
        border-left-color: #27ae60;
    }
    
    .notification.error {
        border-left-color: #e74c3c;
    }
    
    .notification.warning {
        border-left-color: #f39c12;
    }
    
    .notification-content {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .notification i {
        font-size: 1.2rem;
    }
    
    .notification.success i {
        color: #27ae60;
    }
    
    .notification.error i {
        color: #e74c3c;
    }
    
    .notification.warning i {
        color: #f39c12;
    }
    
    .notification.info i {
        color: #3498db;
    }
    
    .popular-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: var(--primary-color);
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .no-products, .empty-cart {
        text-align: center;
        padding: 40px 20px;
        grid-column: 1 / -1;
    }
    
    .no-products i, .empty-cart i {
        font-size: 3rem;
        color: var(--gray-color);
        margin-bottom: 20px;
    }
    
    .no-products h3, .empty-cart h3 {
        margin-bottom: 10px;
        color: var(--dark-color);
    }
    
    .no-products p, .empty-cart p {
        color: var(--gray-color);
    }
`;
document.head.appendChild(notificationStyles);
// Chatbot funksiyalari
class Chatbot {
    constructor() {
        this.isOpen = false;
        this.messages = document.getElementById('chatbot-messages');
        this.input = document.getElementById('chatbot-input');
        this.sendBtn = document.getElementById('chatbot-send');
        this.toggleBtn = document.querySelector('.chatbot-toggle');
        this.container = document.querySelector('.chatbot-container');
        this.closeBtn = document.querySelector('.chatbot-close');
        
        this.init();
    }
    
    init() {
        this.toggleBtn.addEventListener('click', () => this.toggle());
        this.closeBtn.addEventListener('click', () => this.close());
        this.sendBtn.addEventListener('click', () => this.sendMessage());
        this.input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') this.sendMessage();
        });
        
        // Quick replies
        this.addQuickReplies();
    }
    
    toggle() {
        this.isOpen = !this.isOpen;
        this.container.classList.toggle('active', this.isOpen);
    }
    
    close() {
        this.isOpen = false;
        this.container.classList.remove('active');
    }
    
    sendMessage() {
        const message = this.input.value.trim();
        if (!message) return;
        
        this.addMessage(message, 'user');
        this.input.value = '';
        
        // Simulate bot response
        setTimeout(() => {
            this.botResponse(message);
        }, 1000);
    }
    
    addMessage(content, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${sender}-message`;
        
        const time = new Date().toLocaleTimeString('uz-UZ', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });
        
        messageDiv.innerHTML = `
            <div class="message-content">${content}</div>
            <div class="message-time">${time}</div>
        `;
        
        this.messages.appendChild(messageDiv);
        this.messages.scrollTop = this.messages.scrollHeight;
    }
    
    addQuickReplies() {
        const quickReplies = [
            "Menyuni ko'rsating",
            "Narxlar qanday?",
            "Bron qilish",
            "Manzil qayerda?",
            "Ish vaqtlari"
        ];
        
        const quickRepliesDiv = document.createElement('div');
        quickRepliesDiv.className = 'quick-replies';
        
        quickReplies.forEach(reply => {
            const button = document.createElement('button');
            button.className = 'quick-reply';
            button.textContent = reply;
            button.addEventListener('click', () => {
                this.input.value = reply;
                this.sendMessage();
            });
            quickRepliesDiv.appendChild(button);
        });
        
        // Add to first bot message
        const firstMessage = this.messages.querySelector('.bot-message');
        if (firstMessage) {
            firstMessage.appendChild(quickRepliesDiv);
        }
    }
    
    botResponse(userMessage) {
        let response = '';
        const lowerMessage = userMessage.toLowerCase();
        
        if (lowerMessage.includes('menyu') || lowerMessage.includes('taom')) {
            response = "Bizda O'zbek, Turk, Yevropa va Osiyo taomlari mavjud. Asosiy kategoriyalar: Osh, Kabob, Sho'rva, Salat, Desert. Batafsil ma'lumot uchun menyu bo'limiga o'ting.";
        } else if (lowerMessage.includes('narx') || lowerMessage.includes('qancha')) {
            response = "Taomlar narxi 10,000 so'mdan 50,000 so'mgacha. Osh - 25,000 so'm, Kabob - 28,000 so'm, Chuchvara - 18,000 so'm. To'liq narxlarni menyu bo'limida ko'rishingiz mumkin.";
        } else if (lowerMessage.includes('bron') || lowerMessage.includes('stol')) {
            response = "Stol bron qilish uchun bron qilish bo'limiga o'ting yoki +998 90 123 45 67 raqamiga qo'ng'iroq qiling. Bron qilish bepul!";
        } else if (lowerMessage.includes('manzil') || lowerMessage.includes('qayerda')) {
            response = "Biz Toshkent shahri, Yunusobod tumanida joylashganmiz. Yaqin metro: Yunusobod. Batafsil manzil va yo'nalish uchun aloqa bo'limiga qarang.";
        } else if (lowerMessage.includes('vaqt') || lowerMessage.includes('ochiq')) {
            response = "Ish vaqtimiz: Dushanba-Yakshanba, soat 9:00 dan 23:00 gacha. Juma kunlari ertaroq - soat 8:00 dan ochiqmiz.";
        } else if (lowerMessage.includes('yetkazib') || lowerMessage.includes('delivery')) {
            response = "Ha, biz yetkazib berish xizmatiga ega. Minimal buyurtma - 30,000 so'm. Yetkazish vaqti - 30-45 daqiqa. Toshkent bo'ylab yetkazamiz.";
        } else {
            response = "Kechirasiz, savolingizni aniq tushunmadim. Men sizga menyu, narxlar, bron qilish, manzil va ish vaqtlari haqida ma'lumot bera olaman. Qaysi birini bilishni xohlaysiz?";
        }
        
        this.addMessage(response, 'bot');
    }
}

// Restoran tafsilotlari bo'limi
class RestaurantDetails {
    constructor() {
        this.tabs = document.querySelectorAll('.detail-tab');
        this.panes = document.querySelectorAll('.detail-pane');
        this.init();
    }
    
    init() {
        this.tabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                const tabName = e.target.getAttribute('data-tab');
                this.switchTab(tabName);
            });
        });
    }
    
    switchTab(tabName) {
        // Remove active class from all tabs and panes
        this.tabs.forEach(tab => tab.classList.remove('active'));
        this.panes.forEach(pane => pane.classList.remove('active'));
        
        // Add active class to current tab and pane
        const activeTab = document.querySelector(`[data-tab="${tabName}"]`);
        const activePane = document.getElementById(`${tabName}-pane`);
        
        if (activeTab && activePane) {
            activeTab.classList.add('active');
            activePane.classList.add('active');
        }
    }
}

// Yangilangan qidiruv tizimi
class EnhancedSearch {
    constructor() {
        this.searchIndex = this.createSearchIndex();
        this.init();
    }
    
    createSearchIndex() {
        // Mahsulotlar, ingredientlar va boshqa ma'lumotlarni qidiruv indeksiga qo'shish
        const index = [];
        
        products.forEach(product => {
            index.push({
                type: 'product',
                title: product.name,
                description: product.description,
                category: product.category,
                price: product.price,
                ingredients: product.ingredients.join(', '),
                url: `#product-${product.id}`
            });
        });
        
        // Restoran ma'lumotlarini qo'shish
        index.push(
            {
                type: 'info',
                title: 'Restoran Tarixi',
                description: '10 yillik tajriba, 2013 yildan beri xizmat',
                category: 'about',
                url: '#history'
            },
            {
                type: 'info',
                title: 'Oshpazlar',
                description: 'Tajribali xalqaro oshpazlar jamoasi',
                category: 'about',
                url: '#chefs'
            },
            {
                type: 'info',
                title: 'Bron Qilish',
                description: 'Stol bron qilish va tadbir tashkil qilish',
                category: 'reservation',
                url: '#reservation'
            },
            {
                type: 'info',
                title: 'Aloqa',
                description: 'Manzil, telefon va ish vaqtlari',
                category: 'contact',
                url: '#contact'
            }
        );
        
        return index;
    }
    
    init() {
        // Asosiy qidiruvni yangilash
        DOM.mainSearchBtn.addEventListener('click', () => this.performSearch());
        DOM.mainSearch.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') this.performSearch();
        });
        
        DOM.searchBtn.addEventListener('click', () => this.performHeaderSearch());
    }
    
    performSearch() {
        const query = DOM.mainSearch.value.trim().toLowerCase();
        if (!query) return;
        
        const results = this.searchIndex.filter(item => 
            item.title.toLowerCase().includes(query) ||
            item.description.toLowerCase().includes(query) ||
            (item.ingredients && item.ingredients.toLowerCase().includes(query)) ||
            item.category.toLowerCase().includes(query)
        );
        
        this.displaySearchResults(results, query);
    }
    
    performHeaderSearch() {
        const query = DOM.searchInput.value.trim().toLowerCase();
        if (!query) return;
        
        const results = this.searchIndex.filter(item => 
            item.title.toLowerCase().includes(query) ||
            item.description.toLowerCase().includes(query)
        );
        
        this.displaySearchResults(results, query);
    }
    
    displaySearchResults(results, query) {
        // Agar mahsulot topilsa, mahsulotlar bo'limiga o'tkazish
        if (results.some(result => result.type === 'product')) {
            // Mahsulotlar bo'limiga scroll qilish
            document.getElementById('menu').scrollIntoView({ behavior: 'smooth' });
            
            // Filtrlash
            const productResults = results.filter(result => result.type === 'product');
            const categories = [...new Set(productResults.map(result => result.category))];
            
            if (categories.length === 1) {
                // Faqat bitta kategoriyada natija topilsa
                currentCategory = categories[0];
                DOM.categories.forEach(cat => {
                    cat.classList.toggle('active', cat.getAttribute('data-category') === currentCategory);
                });
            }
            
            // Mahsulotlarni filtrlash
            filterProducts(query, currentCategory);
            
            // Qidiruv natijalari haqida bildirishnoma
            showNotification(`${results.length} ta natija topildi "${query}" so'rovi bo'yicha`, 'success');
        } else if (results.length > 0) {
            // Boshqa turdagi natijalar
            const firstResult = results[0];
            
            // Tegishli bo'limga o'tkazish
            if (firstResult.url) {
                const targetElement = document.querySelector(firstResult.url);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                    showNotification(`Sizni "${firstResult.title}" bo'limiga olib bordik`, 'info');
                }
            }
        } else {
            // Natija topilmasa
            showNotification(`"${query}" so'rovi bo'yicha hech narsa topilmadi`, 'error');
        }
    }
}

// Dasturni yangilash
function initEnhancedApp() {
    // Avvalgi initApp funksiyasini chaqirish
    initApp();
    
    // Yangi funksionallikni qo'shish
    new Chatbot();
    new RestaurantDetails();
    new EnhancedSearch();
}

// DOM yuklanganda yangilangan dasturni ishga tushirish
document.addEventListener('DOMContentLoaded', initEnhancedApp);