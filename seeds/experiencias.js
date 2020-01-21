
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('experiencias').del()
    .then(function () {
      // Inserts seed entries
      return knex('experiencias').insert([
        {
          experiencia: "Jovem Aprendiz",
          empresa: "IMB SA",
          cargo: "Auxiliar Administrativo",
          dataInicial: "09/01/2010",
          dataFinal: "20/12/2011",
          localizacao: "Rio de Janeiro",
          funcoes: "Escravo de todos",
          usuario: 1
        }
      ]);
    });
};
