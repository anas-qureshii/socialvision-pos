window.addEventListener("DOMContentLoaded", () => {
    if (document.getElementById("add_items")) {
        let addItem = document.getElementById("add_items");
        let popParent = document.getElementById("items_pop");
        let nestedPop = document.getElementById("nested_popup");
        let closeBtns = document.querySelectorAll(".close-btn");
        // let pop = document.getElementById('items_pop');
        addItem.addEventListener("click", () => {
            popParent.classList.remove("hidden");
        });

        Array.from(closeBtns).forEach((element) => {
            element.addEventListener("click", function () {
                let parent = document.getElementById(
                    `${this.getAttribute("parent-id")}`
                );
                parent.classList.add("hidden");
            });
        });

        // selecting select for just open nested popup

        let selPrdBtn = document.getElementsByClassName("sel-p-btn");
        Array.from(selPrdBtn).forEach((item) => {
            item.addEventListener("click", function (e) {
                if (this.getAttribute("p-type") != "0") {
                    nestedPop.classList.remove("hidden");
                }
            });
        });

        // main functionality starts here

        let search__inp = document.getElementById("search__product__inp");
        let s__err__alert = document.getElementById("search__error_alert");
        let s__success__alert = document.getElementById(
            "search__success_alert"
        );
        let s__loader = document.getElementById("search_loader");
        // table body
        let search__result__table = document.getElementById(
            "search_results_table"
        );
        let table__body = document.getElementById("search_results_body");
        let debounceTimer;

        search__inp.addEventListener("keyup", (e) => {
            let val = e.target.value.trim();
            console.log(val);
            clearTimeout(debounceTimer);
            search__result__table.classList.add("hidden");
            table__body.innerHTML = "";

            if (val.length > 3) {
                if (!s__err__alert.classList.contains("hidden")) {
                    s__err__alert.classList.add("hidden");
                }
                if (!s__success__alert.classList.contains("hidden")) {
                    s__success__alert.classList.add("hidden");
                }
                search__inp.style.borderColor = "#1447e6";
                debounceTimer = setTimeout(async () => {
                    try {
                        s__loader.classList.remove("hidden");
                        const response = await fetch(
                            `http://127.0.0.1:8000/api/product/search/${val}`,
                            {
                                method: "POST",
                                headers: {
                                    "content-type": "application/json",
                                },
                                body: JSON.stringify({ limit: 20, offset: 0 }),
                            }
                        );
                        //  Check if the response is O   K
                        if (!response.ok) {
                            throw new Error(
                                `HTTP error! status: ${response.status}`
                            );
                        }
                        const res__data = await response.json();
                        s__loader.classList.add("hidden");

                        if (res__data.status) {
                            //checking data is present or not
                            if (res__data.data.length > 0) {
                                s__success__alert.innerHTML = `
                            <span class="font-medium">Success alert!</span> ${res__data.message}
                            `;
                                s__success__alert.classList.remove("hidden");

                                let searchResults = res__data.data;
                                let p__types = [
                                    "simple",
                                    "attribute",
                                    "variation",
                                ];
                                searchResults.forEach((itm, indx) => {
                                    let tr = document.createElement("tr");

                                    tr.innerHTML = `
                                     <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        ${indx + 1}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">${
                                            itm.name
                                        }</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">${
                                            p__types[parseInt(itm.product_type)]
                                        }</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        ${itm.stock}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <input type="text"
                                            class="outline-none border border-gray-200 focus:border-[#1447e6] p-2 text-sm themeFont w-12">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" id="p-price-${
                                        itm.id
                                    }">
                                ${itm.price}pkr
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="options flex flex-wrap gap-1" id="to_sel_opts">
                                            -
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <button type="button" p-type='${
                                                p__types[
                                                    parseInt(itm.product_type)
                                                ]
                                            }' product-id='${itm.id}'
                                                class="sel-p-btn bg-[#1447e6] text-white p-2 rounded-md 
                                                themeFont text-sm hover:bg-blue-600 ease-linear 
                                                duration-200 cursor-pointer select-billing-product flex gap-1 items-center">
                                                <div
                                                    class="w-3 h-3 border-2 border-dashed rounded-full animate-spin border-white hidden">
                                                </div>
                                                select
                                            </button>
                                        </div>
                                    </td>
                                    
                                    `;
                                    table__body.append(tr);
                                });
                                search__result__table.classList.remove(
                                    "hidden"
                                );
                            } else {
                                s__err__alert.innerHTML = `${res__data.message}`;
                                s__err__alert.classList.remove("hidden");
                            }
                        }
                        console.log(res__data);
                    } catch (error) {
                        console.log("failed to fetch the data", error);
                    }
                }, 300);
                // Do something when input length is more than 3
            } else {
                s__err__alert.innerHTML =
                    "search query must contains more than 3 letters .";
                if (s__err__alert.classList.contains("hidden")) {
                    s__err__alert.classList.remove("hidden");
                }
                if (!s__success__alert.classList.contains("hidden")) {
                    s__success__alert.classList.add("hidden");
                }
                search__inp.style.borderColor = "red";
            }
        });
    }
});
