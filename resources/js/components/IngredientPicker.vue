<template>
  <div>
    <!-- Ingredients -->
    <div class="card mb-3">
      <div class="card-header bg-secondary h4">Igrendients</div>
      <div class="card-body">
        <div class="text-muted text-center">
          None yet! Start by adding below.
        </div>
      </div>
    </div>

    <!-- Add Ingredient -->
    <div class="card mb-3">
      <div class="card-header bg-secondary h4">Add Igrendient</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="select-ingredient">Select Ingredient</label>
              <select
                class="form-control"
                id="select-ingredient"
                v-model="addIngredientId"
              >
                <option
                  v-for="(ingredient, index) in this.ingredientList"
                  :key="index"
                  :value="ingredient.id"
                  :selected="(addIngredientId && ingredient.id == addIngredientId)"
                >
                  {{ ingredient.name }}
                </option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="qty">Qty</label>
              <input
                type="text"
                placeholder="1, 400g"
                name="qty"
                class="form-control"
                v-model="addIngredientQty"
              />
            </div>
          </div>
        </div>

        <div class="form-group mt-2">
          <button
            class="btn btn-primary form-control"
            :disabled="!this.addIngredientQty || !this.addIngredientId"
            @click="this.addIngredient"
          >
            Add Ingredient
          </button>
        </div>

        <div class="form-group mt-2" v-if="!this.showCreateIngredient">
          <button
            class="btn btn-secondary form-control"
            @click="showCreateIngredient = true"
          >
            Create New Ingredient
          </button>
        </div>
      </div>
    </div>

    <!-- Create Ingredient -->
    <div class="card mb-3" v-if="this.showCreateIngredient">
      <div class="card-header bg-secondary h4">Create New Igrendient</div>
      <div class="card-body">
        <div class="form-group">
          <label for="ingredientName">Ingredient Name</label>
          <input
            v-model="createIngredientName"
            type="input"
            class="form-control"
            id="ingredientName"
            placeholder="Red Pepper"
          />
        </div>

        <div class="form-group mt-2">
          <button
            class="btn btn-primary form-control"
            @click="createIngredient()"
            :disabled="this.createIngredientName == ''"
          >
            Create Ingredient
          </button>
        </div>
      </div>
    </div>

    <notifications group="all" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      showCreateIngredient: false,
      createIngredientName: "",
      ingredientList: [],
      addIngredientId: 0,
      addIngredientQty: "",
    };
  },
  methods: {
    getIngredients() {
      this.ingredientList = [];
      axios
        .get("/ingredient-picker")
        .then((res) => {
            this.ingredientList = res.data.reverse();

            if (typeof this.ingredientList[0] !== 'undefined') {
                this.addIngredientId = this.ingredientList[0].id;
            }
        });
    },
    createIngredient() {
      axios
        .post("/ingredients", {
          name: this.createIngredientName,
        })
        .then(() => {
          this.fireAlert("success", "Success", "Indredient Created.");
          this.getIngredients();
          this.showCreateIngredient = false;
        })
        .catch(() => this.fireErrorAlert());
    },
    addIngredient() {
        console.log(this.addIngredientId, this.addIngredientQty);

        // axios.post
    },
    fireAlert(type, title, text) {
      this.$notify({ group: "all", title, type, text, duration: 2500 });
    },
    fireErrorAlert() {
      this.fireAlert(
        "error",
        "Error",
        "It looks like something has gone wrong :("
      );
    },
  },
  mounted() {
    this.getIngredients();
  },
};
</script>
