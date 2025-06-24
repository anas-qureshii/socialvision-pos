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

        // let selPrdBtn = document.getElementsByClassName("sel-p-btn");
        // Array.from(selPrdBtn).forEach((item) => {
        //     item.addEventListener("click", function (e) {
        //         if (this.getAttribute("p-type") != "0") {
        //             nestedPop.classList.remove("hidden");
        //         }
        //     });
        // });

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
                                body: JSON.stringify({ limit: 50, offset: 0 }),
                            }
                        );
                        //  Check if the response is O   K
                        if (!response.ok) {
                            throw new Error(
                                `HTTP error! status: ${response.status}`
                            );
                        }
                        const res__data = await response.json();
                        console.log(res__data);
                        s__loader.classList.add("hidden");

                        if (res__data.status) {
                            //checking data is present or not
                            if (res__data.data.length > 0) {
                                s__success__alert.innerHTML = `
                            <span class="font-medium">Success alert!</span> ${res__data.message}
                            `;
                                s__success__alert.classList.remove("hidden");
                                s__err__alert.classList.add("hidden");
                                let searchResults = res__data.data;
                                let p__types = [
                                    "simple",
                                    "attribute",
                                    "variation",
                                ];
                                // sel__opt__btn = '-';
                                // if(parseInt(itm.product_type) != 0){
                                //     sel__opt__btn = `<a href='javascript:void(0)'
                                //     p-id='${itm.id}' class='select-p-opts px-2 py-1 bg-green-500 text-white themeFont text-white'>options</a>`
                                // }
                                table__body.innerHTML = "";
                                searchResults.forEach((itm, indx) => {
                                    let tr = document.createElement("tr");
                                    tr.setAttribute(
                                        "id",
                                        `search-row-${indx + 1}`
                                    );
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
                                        <div class="text-sm text-gray-500 ${
                                            parseInt(itm.product_type) == 0
                                                ? "text-center"
                                                : ""
                                        }">
                                        ${
                                            parseInt(itm.product_type) != 0
                                                ? `<a href='javascript:void(0)' current-row='search-row-${
                                                      indx + 1
                                                  }'
                                    p-id='${
                                        itm.id
                                    }' class='select-p-opts px-2 py-1 rounded bg-green-500 text-white themeFont text-white flex gap-1 items-center'>
                                      <div class="w-3 h-3 border-2 border-dashed rounded-full animate-spin border-white btn-loader hidden" id="sel-loader">
                                      </div>
                                    options</a>`
                                                : "-"
                                        }
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 item-stock">
                                        ${itm.stock}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <input type="text"
                                            class="item-quantity num__inp outline-none border border-gray-200 focus:border-[#1447e6] p-2 text-sm themeFont w-12">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 item-price" id="p-price-${
                                        itm.id
                                    }">
                                ${itm.price}pkr
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 item-rollprice" id="p-roll-price-${
                                        itm.id
                                    }">
                                ${itm.roll_price}pkr
                                    </td>
                                     <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <input type="text"
                                            class="item-custom-price num__inp outline-none border border-gray-200 focus:border-[#1447e6] p-2 text-sm themeFont ">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <select name="" class="unit-select border border-gray-300 rounded p-2">
                                              <option value="">select unit</option>
                                              <option value="feet" selected>per feet</option>
                                              <option value="roll">per roll</option>
                                            </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <button type="button" p-type='${
                                                p__types[
                                                    parseInt(itm.product_type)
                                                ]
                                            }' product-id='${
                                        itm.id
                                    }' parent-row='search-row-${indx + 1}'
                                                class="sel-p-btn bg-[#1447e6] text-white p-2 rounded-md 
                                                themeFont text-sm hover:bg-blue-600 ease-linear 
                                                duration-200 cursor-pointer  flex gap-1 items-center">
                                                <div
                                                    class="w-3 h-3 border-2 border-dashed rounded-full animate-spin border-white btn-loader hidden" id="sel-loader">
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

                                selectProductItems();
                                numInpFunc("num__inp");
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

        // functionality of selecting the options and add to cookie

        function numInpFunc(name) {
            const numberInput = document.getElementsByClassName(`${name}`);
            Array.from(numberInput).forEach((itm) => {
                itm.addEventListener("input", function () {
                    this.value = this.value.replace(/[^0-9.]/g, "");
                });
            });
        }

        function selectProductItems() {
            selectOptions();
            let selectItemsBtn = Array.from(
                document.getElementsByClassName("sel-p-btn")
            );
            selectItemsBtn.forEach((itm, indx) => {
                itm.addEventListener("click", async function (e) {
                    let id = this.getAttribute("product-id");
                    let parentId = this.getAttribute("parent-row");
                    let product__type = this.getAttribute("p-type");
                    let currentRow = document.getElementById(`${parentId}`);
                    let selLoader = currentRow.querySelector("#sel-loader");
                    if (!currentRow) {
                        console.error(`Row with id "${parentId}" not found.`);
                        return;
                    }

                    let quantity_inp =
                        currentRow.querySelector(".item-quantity");
                    let customPrice_inp =
                        currentRow.querySelector(".item-custom-price");
                    let itemUnit_sel = currentRow.querySelector(".unit-select");

                    if (!quantity_inp || !itemUnit_sel) {
                        console.error("Required input/select fields missing.");
                        return;
                    }

                    let [quantity, customPrice, itemUnit] = [
                        quantity_inp.value.trim(),
                        customPrice_inp.value.trim(),
                        itemUnit_sel.value,
                    ];

                    const inputs = [
                        quantity_inp,
                        customPrice_inp,
                        itemUnit_sel,
                    ];

                    inputs.forEach((inp) => {
                        inp.addEventListener("focus", (e) => {
                            e.target.style.borderColor = "#1447e6";
                            s__err__alert.classList.add("hidden");
                        });

                        inp.addEventListener("blur", (e) => {
                            e.target.style.borderColor = "#ebe6e7";
                        });
                    });

                    if (quantity === "" || parseInt(quantity) < 1) {
                        s__success__alert.classList.add("hidden");
                        s__err__alert.classList.remove("hidden");
                        s__err__alert.innerHTML =
                            "Enter quantity and quantity must be greater than 0 before selecting item";
                        quantity_inp.style.borderColor = "red";
                        return;
                    }

                    try {
                        selLoader.classList.remove("hidden");
                        let requestBody = {
                            quantity: quantity,
                            customprice: customPrice,
                            itemunit: itemUnit,
                        };
                        let addProductRequest = await fetch(
                            `http://127.0.0.1:8000/api/product/addproduct/${id}`,
                            {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify(requestBody),
                                credentials: "include",
                            }
                        );

                        let result = await addProductRequest.json();
                        selLoader.classList.add("hidden");
                        console.log(result);
                        if (!result.status) {
                            let err__msg = "";

                            if (result.errors) {
                                Object.values(result.errors).forEach(
                                    (errorArr) => {
                                        err__msg += errorArr.join(" ") + " ";
                                    }
                                );
                            }

                            err__msg = err__msg.trim();

                            s__success__alert.classList.add("hidden");
                            s__err__alert.classList.remove("hidden");
                            s__err__alert.innerHTML = `${err__msg}`;

                            const fields = {
                                quantity: quantity_inp,
                                customprice: customPrice_inp,
                                itemunit: itemUnit_sel,
                            };

                            Object.entries(fields).forEach(([key, element]) => {
                                if (result.errors[key]) {
                                    element.style.borderColor = "red";
                                }
                            });
                        }
                        if (result.status) {
                            alert(result.message);
                        }
                    } catch (err) {
                        console.error("Fetch error:", err);
                    }
                });
            });
        }

        function selectOptions() {
            if (document.getElementsByClassName("select-p-opts")) {
                let prevSelectOpt = {};
                let selOptBtns =
                    document.getElementsByClassName("select-p-opts");
                Array.from(selOptBtns).forEach((opt) => {
                    opt.addEventListener("click", async function () {
                        let pId = this.getAttribute("p-id");
                        let parentRow = this.closest("tr");
                        let itemPriceTd =
                            parentRow.querySelector(".item-price");
                        let itemStockTd =
                            parentRow.querySelector(".item-stock");
                        let itemRollPriceTd =
                            parentRow.querySelector(".item-rollprice");
                        let optLoader = this.querySelector(".btn-loader");
                        optLoader.classList.remove("hidden");
                        let url = `http://127.0.0.1:8000/api/product/show/${pId}`;
                        let response = await fetch(url);
                        let result = await response.json();
                        optLoader.classList.add("hidden");
                        if (result.status) {
                            // printing option to see what is happening
                            let opt__data = JSON.parse(result.data.attributes);
                            let nestedPopBox =
                                document.getElementById("nested_pop_box");
                                // adding close btn 
                            nestedPopBox.innerHTML = `
                                        <a href="javascript:void(0)"
                                        class="nested-close-btn w-6 h-6 bg-red-600 text-white absolute top-6
                                        right-6 -translate-y-1/2 translate-x-1/2 z-11 rounded-full flex items-center  justify-center">
                                         <span class="material-icons material-symbols-rounded !text-[14px]"> close </span>
                                        </a>`;
                            // it will hold item opts
                            let item_opts = {};
                            opt__data.forEach((item, idx) => {
                                let obj__data = Object.entries(item)[0];
                                let attr_unit = obj__data[0];
                                let attr_data = obj__data[1];
                                item_opts[attr_unit] = ""; //initialy setting value will come after selecting opt
                                pop__box__html = "";
                                console.log(prevSelectOpt)
                                attr_data.forEach((element, indx) => {
                                    // for check btn
                                         let radioChk ='';
                                        let beforeClass = '';
                                        let activeBtnClass = ``;
                                    if(prevSelectOpt[attr_unit] && prevSelectOpt[attr_unit] == element){
                                         beforeClass = 'before:!border-6 before:!border-blue-700';
                                         activeBtnClass = `!border-blue-700" shadow-xl`;
                                         radioChk = 'checked'
                                    }
                                    pop__box__html += `
                                                 <label for="${attr_unit}_radio_btn_${indx + 1}"
                                                  class="w-full px-2 py-3 rounded-xl border-2 border-gray-300 flex gap-3 capitalize items-center cursor-pointer transition-all duration-300
                                                   before:w-5 before:h-5 before:border-2 before:border-gray-300 before:rounded-full before:transition-all before:duration-300
                                                    ${beforeClass} ${activeBtnClass}">
                                                      <input type="radio" name="${attr_unit}" value="${element}" class="customize_radio_btn"
                                                          id="${attr_unit}_radio_btn_${indx + 1}" hidden ${radioChk}>
                                                      <span class="text-[16px] themeFont">${element}</span>
                                                  </label>
                                                `;
                                });
                                let div = document.createElement("div");
                                div.className =
                                    "w-full flex flex-col gap-3 p-1";
                                div.innerHTML = `
                                                <p class="text-[16px] themeFont">${attr_unit}</p>
                                                ${pop__box__html}
                                            `;
                                nestedPopBox.append(div);
                            });

                            // appending button
                            if (opt__data.length >= 1) {
                                let div = document.createElement("div");
                                div.className =
                                    "w-full flex flex-col gap-3 p-1";
                                div.innerHTML = `
                                                <p class='p-3 themeFont mb-1 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 hidden' id='nested_box_error'>please select all the options</p>
                                              <button id="sel_product_with_variation" p_type='${result.data.product_type}'
                                                 class="w-full px-2 py-3 flex items-center themeFont cursor-pointer rounded-xl transition-all duration-500 hover:bg-green-600 text-lg capitalize gap-2 ease duration-300 text-gray-500 bg-[#1447e6] text-white">
                                                 <span class="material-icons material-symbols-rounded  cursor-pointer">check_circle</span>
                                                 Done
                                             </button>
                                            `;
                                nestedPopBox.append(div);

                                let customizeBtn =
                                    document.getElementsByClassName(
                                        "customize_radio_btn"
                                    );

                                Array.from(customizeBtn).forEach((item) => {
                                    item.addEventListener("change", () => {
                                        const name = item.name;

                                        // Remove active styles from all radio buttons in the same group
                                        Array.from(customizeBtn).forEach(
                                            (btn) => {
                                                if (btn.name === name) {
                                                    const label =
                                                        btn.parentElement;
                                                    label.classList.remove(
                                                        "!border-blue-700",
                                                        "shadow-xl"
                                                    );
                                                    label.classList.remove(
                                                        "before:!border-6",
                                                        "before:!border-blue-700"
                                                    );
                                                }
                                            }
                                        );

                                        // Add active styles to the selected one
                                        if (item.checked) {
                                            const label = item.parentElement;
                                            label.classList.add(
                                                "!border-blue-700",
                                                "shadow-xl"
                                            );
                                            label.classList.add(
                                                "before:!border-6",
                                                "before:!border-blue-700"
                                            );
                                            item_opts[name] = item.value;
                                        }
                                    });
                                });

                                let nestedPopCloseBtn =
                                    document.querySelector(".nested-close-btn");
                                nestedPopCloseBtn.addEventListener(
                                    "click",
                                    () => {
                                        nestedPop.classList.add("hidden");
                                    }
                                );

                                let doneOptBtn = document.getElementById(
                                    "sel_product_with_variation"
                                );
                                doneOptBtn.addEventListener("click", (e) => {
                                    console.log(item_opts)
                                    let n_err =
                                        document.getElementById(
                                            "nested_box_error"
                                        );
                                    let checkOpt = Object.values(
                                        item_opts
                                    ).filter((val) => val.trim() == "");
                                    if (checkOpt.length > 0) {
                                        n_err.classList.remove("hidden");
                                        setTimeout(() => {
                                            n_err.classList.add("hidden");
                                        }, 3000);
                                        return;
                                    }
                                    if (result.data.product_type == "2") {
                                        let ProductVariations = JSON.parse(
                                            result.data.variations
                                        );
                                        let variationOpt = Object.values(
                                            item_opts
                                        )
                                            .join("-")
                                            .trim();
                                        let VarResult = ProductVariations.find(
                                            (item) =>
                                                Object.keys(item)[0] ===
                                                variationOpt
                                        );
                                        let varResultObj =
                                            Object.values(VarResult)[0];
                                        console.log(varResultObj);
                                        itemPriceTd.textContent = `${varResultObj.variation_per_feet}pkr`;
                                        itemRollPriceTd.textContent = `${varResultObj.variation_per_roll}pkr`;
                                        itemStockTd.textContent = `${varResultObj.var_per_stock}`;
                                        s__err__alert.classList.add("hidden");
                                        s__success__alert.classList.remove(
                                            "hidden"
                                        );
                                        s__success__alert.innerHTML = `successfully updated the variations of ${result.data.name}`;
                                        setTimeout(() => {
                                            s__success__alert.classList.add(
                                                "hidden"
                                            );
                                        }, 3000);
                                    }
                                    prevSelectOpt = {...item_opts}
                                    nestedPop.classList.add("hidden");
                                });
                            }
                            nestedPop.classList.remove("hidden");
                        }
                    });
                });
            }
        }
    }
});
