<template>
  <div>
    <div class="card mb-3">
      <div class="card-header bg-secondary h4">Igrendients</div>
      <div class="card-body">
        <div class="text-muted text-center">
          None yet! Start by adding below.
        </div>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header bg-secondary h4">Add Igrendient</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="select-ingredient">Select Ingredient</label>
              <select class="form-control" id="select-ingredient">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
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
              />
            </div>
          </div>
        </div>

        <div class="form-group mt-2">
          <button class="btn btn-primary form-control">Add Ingredient</button>
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

    <div class="card mb-3" v-if="this.showCreateIngredient">
      <div class="card-header bg-secondary h4">Create New Igrendient</div>
      <div class="card-body">
        <div class="form-group">
          <label for="ingredientName">Ingredient Name</label>
          <input
            type="input"
            class="form-control"
            id="ingredientName"
            placeholder="Red Pepper"
          />
        </div>

        <div class="form-group mt-2">
          <button type="submit" class="btn btn-primary form-control">
            Create Ingredient
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showCreateIngredient: false,
    };
  },
};
</script>
