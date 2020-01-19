
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('table_name').del()
    .then(function () {
      // Inserts seed entries
      return knex('table_name').insert([
        {
          experiencia: "Jovem Aprendiz",
          empresa: "IMB SA",
          cargo: "Auxiliar Administrativo",
          dataInicial: :
          dataFinal: 1,
          localizacao: 1,
          funcoes: "Escravo de todos",
          usuario: 1
        }
      ]);
    });
};
