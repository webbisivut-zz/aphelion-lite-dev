(function() {

    if(window) {
        window.addEventListener("scroll", (event) => {
            let scrollY = this.scrollY;
    
            if(document.getElementById('wb_aphelion_sticky-header')) {
                let stickyHeader = document.getElementById('wb_aphelion_sticky-header');
    
                if(scrollY > 100 && stickyHeader) {
                    stickyHeader.style.display = 'flex';
                } else if(scrollY < 100 && stickyHeader) {
                    stickyHeader.style.display = 'none';
                }

                if(scrollY > 200 && stickyHeader) {
                    stickyHeader.style.opacity = 1;
                } else if(scrollY < 200 && stickyHeader) {
                    stickyHeader.style.opacity = 0;
                }
            }
        }) 
    }
     
}());