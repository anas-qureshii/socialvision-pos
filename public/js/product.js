window.addEventListener("DOMContentLoaded", (e) => {
    const productType = document.getElementById("productType");
    let numberingInp = document.getElementsByClassName("numbering-inp");
    let attributes_data = [];
    let isEditMode = false;

    // Check if we're in edit mode by looking for existing data
    function checkEditMode() {
        const attrInput = document.getElementById("attribute_data_inp");
        const variationInput = document.getElementById("variation_data_inp");
        
        if (attrInput && attrInput.value) {
            try {
                const existingAttrs = JSON.parse(attrInput.value);
                if (existingAttrs && existingAttrs.length > 0) {
                    attributes_data = existingAttrs;
                    isEditMode = true;
                    initializeExistingData();
                }
            } catch (e) {
                console.log("No valid existing attribute data");
            }
        }
    }

    // Initialize existing data for edit mode
    function initializeExistingData() {
        if (!isEditMode || attributes_data.length === 0) return;

        const mainContainer = document.getElementById("main-var-data");
        if (mainContainer) {
            mainContainer.classList.remove("hidden");
        }

        // Create attribute container
        createAttributeContainer(false); // false = no listeners for edit mode
        
        // Render existing attributes
        renderAttributesRows();
        
        // Check for existing variations
        const variationInput = document.getElementById("variation_data_inp");
        if (variationInput && variationInput.value) {
            try {
                const existingVariations = JSON.parse(variationInput.value);
                if (existingVariations && existingVariations.length > 0) {
                    createVariationsFromData(existingVariations);
                }
            } catch (e) {
                console.log("No valid existing variation data");
            }
        }
    }

    // Input validator function
    function inputValidator(itm) {
        itm.addEventListener("input", (e) => {
            let val = e.target.value;
            val = val.replace(/[^0-9.]/g, "");
            val = val.replace(/^(\d*\.\d{0,2})\d*$/, "$1");
            const parts = val.split(".");
            if (parts.length > 2) {
                val = parts[0] + "." + parts[1];
            }
            e.target.value = val;
        });
    }

    // Apply input validation to existing elements
    Array.from(numberingInp).forEach((itm) => {
        inputValidator(itm);
    });

    // Create attribute container
    function createAttributeContainer(withListeners = true) {
        const varDataP = document.getElementById("attribute-data");
        if (document.getElementById("attr-container")) {
            return; // Already exists
        }

        const val = productType ? parseInt(productType.value) : 2; // Default to 2 for edit mode

        const attrDiv = document.createElement("div");
        attrDiv.setAttribute("class", "bg-gray-50 border border-gray-200 p-4 rounded-lg my-4");
        attrDiv.setAttribute("id", "attr-container");
        
        attrDiv.innerHTML = `
            <h3 class="text-lg font-semibold mb-3 themeFont">Product Attributes</h3>
            <div class="flex flex-wrap gap-4 mt-4 main-attr-div">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm mb-1 themeFont">Attribute Name</label>
                    <input type="text" placeholder="e.g., Size" id="attr-name"
                        class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none focus:border-[#1447e6]" />
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm mb-1 themeFont">Attribute Values</label>
                    <input type="text" placeholder="e.g., S, M, L" id="attr-vals"
                        class="mt-1 w-full border border-gray-300 duration-200 rounded p-3 themeFont focus:outline-none focus:border-[#1447e6]" />
                </div>
            </div>
            <button type="button"
                class="bg-[#1447e6] text-white mt-3 p-2 px-3 flex rounded-md themeFont text-sm hover:bg-blue-700 ease-linear duration-200 cursor-pointer"
                id="add_attr">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add
            </button>`;
        
        if (varDataP) {
            varDataP.append(attrDiv);
        }

        if (withListeners) {
            setupAttributeListeners(val);
        }
    }

    // Setup attribute listeners for new attribute creation
    function setupAttributeListeners(productTypeVal) {
        const attrTitle = document.getElementById("attr-name");
        const attrValues = document.getElementById("attr-vals");
        const addAttribute = document.getElementById("add_attr");

        if (!attrTitle || !attrValues || !addAttribute) return;

        const preventEnter = (e) => {
            if (e.key === "Enter") e.preventDefault();
        };

        [attrTitle, attrValues].forEach((el) =>
            el.addEventListener("keydown", preventEnter)
        );

        addAttribute.addEventListener("click", () => {
            const attrTVal = attrTitle.value.trim();
            const attrVVal = attrValues.value.trim();
            const regx = /^[a-zA-Z0-9, ]*$/;

            if (!attrTVal || !attrVVal) {
                alert("It is important to enter Attribute Name And Attribute Value before adding");
                return;
            }

            if (!regx.test(attrTVal) || !regx.test(attrVVal)) {
                alert("Special characters are not allowed in attribute names or values");
                return;
            }

            const attrOpts = attrVVal.split(",").map((v) => v.trim()).filter(Boolean);
            const keys = attributes_data.map((obj) => Object.keys(obj)[0]);

            if (keys.includes(attrTVal)) {
                alert(`The attribute ${attrTVal} is already present`);
                return;
            }

            attributes_data.push({ [attrTVal]: attrOpts });
            
            // Create attr-data wrapper if not exists
            createAttrDataWrapper(productTypeVal);
            
            renderAttributesRows();
            
            // Clear inputs
            attrTitle.value = "";
            attrValues.value = "";
        });
    }

    // Create attr-data wrapper
    function createAttrDataWrapper(productTypeVal) {
        if (!document.getElementById("attr-data")) {
            let makeVariationBtnHtml = `<button 
                class="bg-[#1447e6] text-white p-3 px-4 rounded-md themeFont text-lg hover:bg-blue-600
                 ease-linear duration-200 cursor-pointer" id="make-Variations" type="button">
                    Make Variations
                </button>`;

            const attrDataWrapper = document.createElement("div");
            attrDataWrapper.setAttribute("class", "w-full flex flex-col items-start gap-4 pt-4");
            attrDataWrapper.setAttribute("id", "attr-data");
            attrDataWrapper.innerHTML = `
                <div class="w-full flex flex-col gap-4" id="attributes-container"></div>
                ${productTypeVal > 1 ? makeVariationBtnHtml : ""}
            `;

            document.getElementById("attr-container").append(attrDataWrapper);
            
            if (productTypeVal > 1) {
                setupMakeVariationsListener();
            }
        }
    }

    // Render attributes rows
    function renderAttributesRows() {
        const container = document.getElementById("attributes-container");
        if (!container) return;

        container.innerHTML = "";
        attributes_data.forEach((element, indx) => {
            const key = Object.keys(element)[0];
            const attrValuesHTML = element[key]
                .map((val, num) => `
                    <span class="bg-blue-700 px-3 py-2 text-sm themeFont text-white rounded-md flex items-center">
                        ${val}
                        <button class="ml-2 text-white hover:text-red-200 transition duration-200 attr-opts" type="button" btn-row-index="${indx}" btn-index="${num}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>`
                ).join("");

            const attrElement = document.createElement("div");
            attrElement.setAttribute("class", "w-full flex flex-col sm:flex-row border border-gray-200 rounded-md overflow-hidden attribute-row");
            attrElement.innerHTML = `
                <div class="w-full sm:w-1/3 bg-blue-700 p-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold themeFont text-white">${key}</h3>
                    <button class="remove-attr text-white hover:text-red-200 transition duration-200" type="button" del-row="${indx}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="w-full sm:w-2/3 p-4 flex flex-wrap gap-2 items-center">
                    ${attrValuesHTML}
                </div>`;
            container.append(attrElement);
        });

        // Update hidden input
        const attrInp = document.getElementById("attribute_data_inp");
        if (attrInp) {
            attrInp.value = `${JSON.stringify(attributes_data)}`;
        }

        // Setup removal listeners (works for both new and edit mode)
        setupRemovalListeners();
    }

    // Setup removal listeners for attributes and options
    function setupRemovalListeners() {
        const container = document.getElementById("attributes-container");
        if (!container) return;

        // Remove existing listeners to prevent duplicates
        const newContainer = container.cloneNode(true);
        container.parentNode.replaceChild(newContainer, container);

        newContainer.addEventListener("click", function (e) {
            const removeBtn = e.target.closest(".remove-attr");
            if (removeBtn) {
                e.preventDefault();
                e.stopImmediatePropagation();
                const idx = parseInt(removeBtn.getAttribute("del-row"), 10);
                if (!isNaN(idx) && attributes_data[idx]) {
                    attributes_data.splice(idx, 1);
                    renderAttributesRows();
                }
            }

            const removeOptBtn = e.target.closest(".attr-opts");
            if (removeOptBtn) {
                e.preventDefault();
                e.stopImmediatePropagation();
                const rowIdx = parseInt(removeOptBtn.getAttribute("btn-row-index"), 10);
                const optIndx = parseInt(removeOptBtn.getAttribute("btn-index"), 10);

                if (!isNaN(rowIdx) && attributes_data[rowIdx] && !isNaN(optIndx)) {
                    let optVal = Object.values(attributes_data[rowIdx])[0];
                    if (optVal[optIndx]) {
                        optVal.splice(optIndx, 1);
                        if (optVal.length == 0) {
                            attributes_data.splice(rowIdx, 1);
                        }
                        renderAttributesRows();
                    }
                }
            }
        });
    }

    // Setup make variations listener
    function setupMakeVariationsListener() {
        const makeVariationBtn = document.getElementById("make-Variations");
        if (makeVariationBtn) {
            makeVariationBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopImmediatePropagation();
                createVariations();
            });
        }
    }

    // Create variations (for new creation)
    function createVariations() {
        let variationContainer = document.getElementById("variation_container");
        if (!variationContainer) {
            let div = document.createElement("div");
            div.setAttribute("class", "w-full flex flex-col gap-6 pt-4");
            div.setAttribute("id", "variation_container");
            document.getElementById("attr-container").append(div);
            variationContainer = document.getElementById("variation_container");
        } else {
            variationContainer.innerHTML = "";
        }

        const combination = generateVariationStrings(attributes_data);
        renderVariationBoxes(combination, variationContainer);
        setupVariationListeners(combination);
    }

    // Create variations from existing data (for edit mode)
    function createVariationsFromData(existingVariations) {
        let variationContainer = document.getElementById("variation_container");
        if (!variationContainer) {
            let div = document.createElement("div");
            div.setAttribute("class", "w-full flex flex-col gap-6 pt-4");
            div.setAttribute("id", "variation_container");
            document.getElementById("attr-container").append(div);
            variationContainer = document.getElementById("variation_container");
        }

        // Extract variation names from existing data
        const variationNames = existingVariations.map(variation => Object.keys(variation)[0]);
        
        renderVariationBoxes(variationNames, variationContainer, existingVariations);
        setupVariationListeners(variationNames, existingVariations);
    }

    // Render variation boxes
    function renderVariationBoxes(combinations, container, existingData = null) {
        combinations.forEach((elem, idx) => {
            let div = document.createElement("div");
            div.setAttribute("class", "w-full flex flex-col border border-gray-200 rounded-md overflow-hidden variation-box");
            
            // Get existing data for this variation if available
            let existingValues = {};
            if (existingData) {
                const existingVariation = existingData.find(v => Object.keys(v)[0] === elem);
                if (existingVariation) {
                    existingValues = existingVariation[elem];
                }
            }

            div.innerHTML = `
                <div class="w-full bg-blue-700 p-4 flex items-center justify-between var-header cursor-pointer" data-box='variation-box-${idx}'>
                    <h3 class="text-lg font-semibold themeFont text-white capitalize">${elem}</h3>
                    <button class="text-white hover:text-red-200 transition duration-200" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
                <div class="w-full bg-gray-50 p-6 var-body transition-all duration-300 ease-in ${isEditMode ? '' : 'hidden'}" id='variation-box-${idx}'>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="flex flex-col">
                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                Per feet Price:
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" placeholder="Enter price per feet" 
                                value="${existingValues.variation_per_feet || ''}"
                                class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-md numberInp themeFont focus:ring-blue-500 focus:border-blue-500 var_per_feet">
                        </div>
                        <div class="flex flex-col">
                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                Per Roll price:
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" placeholder="Enter price per roll" 
                                value="${existingValues.variation_per_roll || ''}"
                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont numberInp rounded-md focus:ring-blue-500 focus:border-blue-500 var_per_roll">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="flex flex-col">
                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                Retail Price (per feet):
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" placeholder="Enter retail price per feet" 
                                value="${existingValues.variation_per_retail || ''}"
                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont numberInp rounded-md focus:ring-blue-500 focus:border-blue-500 var_per_retail">
                        </div>
                        <div class="flex flex-col">
                            <label class="flex text-sm font-medium text-gray-700 mb-1">
                                Wholesale Price (per feet):
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" placeholder="Enter wholesale price per feet" 
                                value="${existingValues.variation_per_wholesale || ''}"
                                class="w-full px-4 py-3 mt-2 border border-gray-300 themeFont numberInp rounded-md focus:ring-blue-500 focus:border-blue-500 var_per_wholesale">
                        </div>
                    </div>
                    <div class="w-full">
                        <label class="flex text-sm font-medium text-gray-700 mb-1">
                            Stock (Quantity):
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <input type="text" placeholder="Enter available quantity for this variation" 
                            value="${existingValues.var_per_stock || ''}"
                            class="w-full px-4 py-3 mt-2 themeFont border border-gray-300 rounded-md numberInp focus:ring-blue-500 focus:border-blue-500 var_per_stock">
                    </div>
                </div>`;
            container.append(div);
        });

        // Add save button
        if (!document.getElementById("saveVariations")) {
            container.append(
                Object.assign(document.createElement("button"), {
                    className: "bg-[#1447e6] text-white p-3 px-4 rounded-md themeFont text-lg hover:bg-blue-600 ease-linear duration-200 cursor-pointer",
                    id: "saveVariations",
                    textContent: "Save Variations",
                    type: "button"
                })
            );
        }
    }

    // Setup variation listeners
    function setupVariationListeners(combinations, existingData = null) {
        // Setup accordion functionality
        let varHeaders = document.getElementsByClassName("var-header");
        Array.from(varHeaders).forEach((item) => {
            // Remove existing listeners
            const newItem = item.cloneNode(true);
            item.parentNode.replaceChild(newItem, item);
            
            newItem.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                let parent = this.closest(".variation-box");
                let varBody = parent.querySelector(".var-body");
                varBody.classList.toggle("hidden");
            });
        });

        // Setup number input validation
        let numberInps = Array.from(document.getElementsByClassName("numberInp"));
        numberInps.forEach((itm) => {
            inputValidator(itm);
        });

        // Setup save variations listener
        const saveVariations = document.getElementById("saveVariations");
        if (saveVariations) {
            // Remove existing listener
            const newSaveBtn = saveVariations.cloneNode(true);
            saveVariations.parentNode.replaceChild(newSaveBtn, saveVariations);
            
            newSaveBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopImmediatePropagation();
                saveVariationData(combinations);
            });
        }
    }

    // Save variation data
    function saveVariationData(combinations) {
        const fields = ['var_per_feet', 'var_per_roll', 'var_per_retail', 'var_per_wholesale', 'var_per_stock'];
        let variation_data = [];

        combinations.forEach((item, indx) => {
            const fieldElements = {};
            fields.forEach(field => {
                fieldElements[field] = document.getElementsByClassName(field)[indx];
            });

            let allValid = true;
            for (let key in fieldElements) {
                if (!validateInputField(fieldElements[key])) {
                    allValid = false;
                }
            }

            if (allValid) {
                variation_data.push({
                    [item]: {
                        variation_per_feet: fieldElements.var_per_feet.value,
                        variation_per_roll: fieldElements.var_per_roll.value,
                        variation_per_retail: fieldElements.var_per_retail.value,
                        variation_per_wholesale: fieldElements.var_per_wholesale.value,
                        var_per_stock: fieldElements.var_per_stock.value,
                    },
                });
            }
        });

        if (variation_data.length > 0) {
            const variationDataInp = document.getElementById("variation_data_inp");
            if (variationDataInp) {
                variationDataInp.value = JSON.stringify(variation_data);
                console.log("Variation data saved:", variationDataInp.value);
            }
        }
    }

    // Helper functions
    function generateVariationStrings(attributes) {
        const entries = attributes.map((attr) => {
            const key = Object.keys(attr)[0];
            const values = attr[key];
            return values.map((value) => ({ [key]: value }));
        });

        const combos = cartesianProduct(entries);
        return combos.map((combination) => {
            const merged = Object.assign({}, ...combination);
            return Object.values(merged).join("-");
        });
    }

    function cartesianProduct(arr) {
        return arr.reduce((a, b) => a.flatMap((d) => b.map((e) => [...d, e])), [[]]);
    }

    function errorCreation(parent) {
        if (!parent.querySelector(".var-error")) {
            parent.append(
                Object.assign(document.createElement("p"), {
                    className: "text-sm themeFont text-red-400 var-error mt-1",
                    textContent: "This field must be filled in order to save variations",
                })
            );
        }
    }

    function errorReduction(parent) {
        const errorElement = parent.querySelector(".var-error");
        if (errorElement) {
            errorElement.remove();
        }
    }

    function validateInputField(input) {
        const parent = input.parentElement;
        if (input.value.trim() === "") {
            errorCreation(parent);
            return false;
        } else {
            errorReduction(parent);
            return true;
        }
    }

    // Main product type change listener (for new creation)
    if (productType) {
        productType.addEventListener("change", (e) => {
            const atCon = document.getElementById("attr-container");
            if (atCon) {
                const confirmation = confirm("By switching options, you may lose data. Continue?");
                if (confirmation) {
                    atCon.remove();
                    attributes_data = [];
                    return;
                } else {
                    return;
                }
            }

            const val = parseInt(e.target.value);
            if (val <= 0) return;

            const mainContainer = document.getElementById("main-var-data");
            if (mainContainer) {
                mainContainer.classList.remove("hidden");
            }

            const addAttr = document.getElementById("add_attrs");
            if (addAttr) {
                addAttr.addEventListener("click", (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    createAttributeContainer(true); // true = with listeners for new creation
                });
            }
        });
    }

    // Initialize on page load
    checkEditMode();
});