
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('idiomas').del()
    .then(function () {
      // Inserts seed entries
      return knex('idiomas').insert([
        {
          idioma: "Inglês",
          nivelIdioma: "Intermediario",
          descricao: "teste descricao",
          usuario: 1
        }
      ]);
    });
};
