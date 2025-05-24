window.addEventListener("DOMContentLoaded", (e) => {
    // const paginationContainer = document.querySelector("pagination");
    // if (paginationContainer) {

    // Example usage:
    // createPagination(5, 1);
    // }
    // pagination ends here

    // it is for pagination

    if (document.getElementById("sidebar")) {
        sideBar = document.getElementById("sidebar");
        let mainWrapper = document.getElementById("main-wrapper");

        let sideTBtn = document.getElementById("sideBar_toggle_btn");
        // let tog = false;
        sideTBtn.addEventListener("click", () => {
            sideBar.classList.toggle("!left-[-250px]");
            mainWrapper.classList.toggle("!ml-[0px]");
            mainWrapper.classList.toggle("!max-w-full");
        });

        // dropdown for sidebar

        let dropDownAnc = document.getElementsByClassName("side-nav-link");

        Array.from(dropDownAnc).forEach((item) => {
            if (item.getAttribute("ancType") == "dropdown") {
                let dropId = document.getElementById(
                    `${item.getAttribute("dropElement")}`
                );

                item.addEventListener("click", () => {
                    item.querySelectorAll("span")[1].classList.toggle(
                        "rotate-180"
                    );
                    // item.classList.toggle(["bg-[#eaf3fd]"]);
                    dropId.classList.toggle("hidden");
                });
            }
        });
    }

    function createPagination(totalPages, currentPage, id) {
        const paginationContainer = document.getElementById(id);
        if (!paginationContainer) return; // Ensure the container exists
        paginationContainer.innerHTML = "";

        const pageNumbers = [];

        if (currentPage > 1) {
            pageNumbers.push({
                text: "«",
                page: currentPage - 1,
            });
        }

        if (totalPages <= 5) {
            for (let i = 1; i <= totalPages; i++) {
                pageNumbers.push({
                    text: i,
                    page: i,
                });
            }
        } else {
            pageNumbers.push({
                text: 1,
                page: 1,
            });

            if (currentPage > 3) {
                pageNumbers.push({
                    text: "...",
                });
            }

            if (currentPage > 1 && currentPage < totalPages) {
                pageNumbers.push({
                    text: currentPage,
                    page: currentPage,
                });
            }

            if (currentPage < totalPages - 2) {
                pageNumbers.push({
                    text: "...",
                });
            }

            pageNumbers.push({
                text: totalPages,
                page: totalPages,
            });
        }

        if (currentPage < totalPages) {
            pageNumbers.push({
                text: "»",
                page: currentPage + 1,
            });
        }

        pageNumbers.forEach((item) => {
            const li = document.createElement("li");
            li.textContent = item.text;
            li.className = `px-3 py-1 rounded-full w-10 h-10 flex items-center justify-center cursor-pointer transition ${
                item.text === "..."
                    ? "text-gray-500 cursor-default"
                    : item.page === currentPage
                    ? "bg-blue-500 text-white font-semibold"
                    : "bg-blue-100 text-blue-700 hover:bg-blue-500 hover:text-white"
            }`;

            if (item.text !== "...") {
                li.addEventListener("click", () =>
                    createPagination(totalPages, item.page, id)
                );
            }

            paginationContainer.appendChild(li);
        });
    }
    createPagination(10, 1, "pagination");

    createPagination(10, 1, "product-p-pagination");

    if (document.getElementById("dropzone")) {
        const dropZone = document.getElementById("dropzone");
        const fileInput = document.getElementById("drag_file");
        const preview = document.getElementById("appendDropFile");
        const overlay = document.getElementById("overlay");

        let dragCounter = 0;

        function handleFile(file) {
            preview.innerHTML = "";
            if (file) {
                if (
                    ![
                        "image/png",
                        "image/jpeg",
                        "image/jpg",
                        "image/webp",
                    ].includes(file.type)
                ) {
                    alert("Only PNG, JPEG, and JPG files are allowed.");
                    return;
                }
                if (file.size > 1024 * 1024) {
                    // 1MB
                    alert("File size should be less than 1MB.");
                    return;
                }

                const reader = new FileReader();
                let div = document.createElement("div");
                reader.onload = (event) => {
                    div.className = "w-16 h-16 rounded-lg bg-gray-500 relative";
                    div.setAttribute("id", "dropFeatured-01");
                    div.innerHTML = `   <img class="w-full h-full object-cover rounded-lg" src="${event.target.result}"
                                    alt="">
                                <button
                                    class="w-4 h-4 text-[10px] flex items-center justify-center rounded-full bg-red-800 text-white hover:bg-black absolute -top-2 -right-2 cursor-pointer dropItemRemover" remove-item='dropFeatured-01'>
                                    <span class="material-icons material-symbols-outlined !text-sm">
                                        close
                                    </span>
                                </button>`;

                    preview.append(div);
                };

                setTimeout(() => {
                    const removeBtn = div.querySelector(".dropItemRemover");
                    if (removeBtn) {
                        removeBtn.addEventListener("click", () => {
                            div.remove();
                            fileInput.value = "";
                        });
                    }
                }, 50); // Short delay for DOM update

                reader.readAsDataURL(file);
            }
        }

        dropZone.addEventListener("dragenter", (e) => {
            e.preventDefault();
            dragCounter++;
            overlay.style.display = "block";
        });

        dropZone.addEventListener("dragover", (e) => {
            e.preventDefault();
        });

        dropZone.addEventListener("dragleave", () => {
            dragCounter--;
            if (dragCounter === 0) {
                overlay.style.display = "none";
            }
        });

        dropZone.addEventListener("drop", (e) => {
            e.preventDefault();
            dragCounter = 0;
            overlay.style.display = "none";
            const file = e.dataTransfer.files[0];
            fileInput.files = e.dataTransfer.files; // Assign file to input
            handleFile(file);
        });

        fileInput.addEventListener("change", (e) => {
            const file = e.target.files[0];
            handleFile(file);
        });
    }
});
