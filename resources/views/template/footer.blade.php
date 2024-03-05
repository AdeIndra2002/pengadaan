<style>
    /* Ensure the back-to-top button is positioned above the footer */
    #back-to-top {
        position: fixed;
        bottom: 70px;
        /* Adjust as needed */
        right: 20px;
        /* Adjust as needed */
        z-index: 999;
        /* Ensure the button appears above other elements */
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    #back-to-top.show {
        opacity: 1;
    }

</style>

<!-- Back to Top Button -->
<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
</a>

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="https://github.com/AdeIndra2002">Ade Indra</a>.</strong>All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>

<script>
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("back-to-top").classList.add("show");
        } else {
            document.getElementById("back-to-top").classList.remove("show");
        }
    }

    // Smooth scrolling to top
    document.getElementById("back-to-top").addEventListener("click", function(event) {
        event.preventDefault();
        scrollToTop();
    });

    function scrollToTop() {
        const scrollStep = -window.scrollY / (1000 / 15); // Adjust scrolling speed here
        const scrollInterval = setInterval(function() {
            if (window.scrollY !== 0) {
                window.scrollBy(0, scrollStep);
            } else {
                clearInterval(scrollInterval);
            }
        }, 2); // Adjust interval for smoother scrolling
    }

</script>
