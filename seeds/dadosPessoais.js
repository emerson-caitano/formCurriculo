
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('dadosPessoais').del()
    .then(function () {
      // Inserts seed entries
      return knex('dadosPessoais').insert([
        {
          nome: "joao",
          titulo: "sr",
          estado: "RJ",
          usuario: 1
        }
      ]);
    });
};
