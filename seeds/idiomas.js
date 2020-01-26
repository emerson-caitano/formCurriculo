
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('idiomas').del()
    .then(function () {
      // Inserts seed entries
      return knex('idiomas').insert([
        {
          nivel: "Intermediario",
          descricao: "Ingles",
          usuario: 1
        }
      ]);
    });
};
