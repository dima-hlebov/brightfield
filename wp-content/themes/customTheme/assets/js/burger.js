window.onload = function() {
    function toggleBurger() {
        const burgerOpen = document.querySelector('#burger-open');
        const burgerClose = document.querySelector('#burger-close');
            burgerOpen.addEventListener("click", () =>{
                toggle();
            });
            burgerClose.addEventListener("click", () =>{
                toggle();
        });

        document.addEventListener('click', (event) => {
                if (!event.target.closest(".navigation") && !event.target.closest('#burger-open')) {
                    document.querySelector('.navigation').classList.remove("navigation--active");
                    document.querySelector('#burger-open').classList.remove("burger--active");
                    document.querySelector('#burger-close').classList.remove("burger--active");
                }
        });
    }

    function toggle() {
        document.querySelector('#burger-open').classList.toggle("burger--active");
        document.querySelector('#burger-close').classList.toggle("burger--active");
        document.querySelector('.navigation').classList.toggle("navigation--active");
    }
    toggleBurger()
}