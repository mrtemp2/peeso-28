<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_AddEtabId extends CI_Controller
{
    public function add_etab_id_to_tables()
    {
        $this->load->dbforge(); // Load the DBForge library
        $this->load->database();

        // Fetch the prefix from the database config
        $prefix = $this->db->dbprefix;

        // Fetch all table names
        $query = $this->db->query('SHOW TABLES');
        $tables = array_column($query->result_array(), 'Tables_in_' . $this->db->database);

        // Print the fetched tables for debugging
        print_r($tables);

        // Define excluded tables (with prefix)
        $excluded_tables = [
            $prefix . 'etablissements',
        ];

        // Define the column to add
        $column = [
            'etab_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE, // Allow NULL values
            ],
        ];

        // Iterate over tables
        foreach ($tables as $table) {
            // Remove the prefix if present (to avoid double prefix issues)
            $raw_table_name = str_replace($prefix, '', $table);

            // Check if table is excluded
            if (!in_array($table, $excluded_tables)) {
                // Ensure `dbforge` applies the prefix only once
                $prefixed_table = $this->db->dbprefix($raw_table_name);

                // Check if the column already exists
                if (!$this->db->field_exists('etab_id', $prefixed_table)) {
                    if ($this->dbforge->add_column($raw_table_name, $column)) {
                        echo "Added `etab_id` to {$prefixed_table}<br>";
                    } else {
                        echo "Failed to add `etab_id` to {$prefixed_table}<br>";
                    }
                } else {
                    echo "`etab_id` already exists in {$prefixed_table}<br>";
                }
            } else {
                echo "Skipped excluded table: {$table}<br>";
            }
        }

        echo "Process completed.<br>";
    }
}
