<script>
    const menuItems = document.querySelectorAll('.menu-product a');
    const productSections = document.querySelectorAll('.box-product');

    menuItems.forEach((menuItem, index) {
        menuItem.addEventListener('click', () => {
            // Ẩn tất cả các sản phẩm trước khi hiển thị sản phẩm tương ứng
            productSections.forEach((section) => {
                section.style.display = 'none';
            });

            // Hiển thị sản phẩm tương ứng với menu được chọn
            productSections[index].style.display = 'block';
        });
    });
</script>