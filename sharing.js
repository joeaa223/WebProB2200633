document.addEventListener('DOMContentLoaded', (event) => {
    // 获取按钮和模态窗口元素
    const imageModal = document.getElementById('imageModal');
    const closeModalButton = document.querySelectorAll('.close'); // 假设有多个关闭按钮
    const openModalButtons = document.querySelectorAll('.openModalButton');


    const ctx = imageCanvas.getContext('2d');
    const addTextButton = document.getElementById('addTextToImage');
    let selectedImageSrc; // 存储选中的图片源

    // 打开模态窗口


    // 为所有关闭按钮添加事件监听
    closeModalButton.forEach(btn => {
        btn.addEventListener('click', function() {
            imageModal.style.display = 'none'; // 关闭图片选择模态窗口
            document.getElementById('imageBig').style.display = 'none'; // 如果有放大图片的模态窗口也关闭
        });
    });

    // 点击模态窗口外部关闭模态窗口
    window.addEventListener('click', function(event) {
        if (event.target === imageModal) {
            imageModal.style.display = 'none';
        }
        if (event.target === document.getElementById('imageBig')) {
            document.getElementById('imageBig').style.display = 'none';
        }
    });

    // 获取所有的可点击图片
    const images = document.querySelectorAll('.image-share');

    // 为每张图片添加点击事件监听器
    images.forEach(image => {
        image.addEventListener('click', function() {
            // 如果未选中，则显示并选中图片
            images.forEach(img => img.classList.remove('selected-image')); // 清除其他图片的选中状态
            image.classList.add('selected-image');

            // 显示放大的图片模态窗口
            const imageBigModal = document.getElementById('imageBig');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = image.getAttribute('src');
            imageBigModal.style.display = 'block';
        });
    });

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            imageModal.style.display = 'block';
        });
    });



});




  







