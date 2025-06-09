<?php

namespace App\Imports;

 use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // To use header row for mapping columns
use Maatwebsite\Excel\Concerns\WithValidation; // Optional for validation
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\MemberMaster;

class MembersImport implements ToModel, WithHeadingRow, WithValidation {

      use Importable;

      public function model(array $row) {
            return new MemberMaster([
                      'account_name' => $row['account_name'] ?? null,
                      'parent_region' => $row['parent_region'] ?? null,
                      'parent_zone' => $row['parent_zone'] ?? null,
                      'member_id' => $row['member_id'] ?? null,
                      'first_name' => $row['first_name'] ?? null,
                      'last_name' => $row['last_name'] ?? null,
                      'address_line1' => $row['address_line1'] ?? null,
                      'address_line2' => $row['address_line2'] ?? null,
                      'address_line3' => $row['address_line3'] ?? null,
                      'city' => $row['city'] ?? null,
                      'state' => $row['state'] ?? null,
                      'zip' => $row['zip'] ?? null,
                      'birthdate' => isset($row['birthdate']) ? \Carbon\Carbon::parse($row['birthdate'])->format('Y-m-d') : null,
                      'email' => $row['email'] ?? null,
                      'mobile' => $row['mobile'] ?? null,
                      'home_phone' => $row['home_phone'] ?? null,
                      'gender' => $row['gender'] ?? null,
                      'occupation' => $row['occupation'] ?? null,
                      'join_date' => isset($row['join_date']) ? \Carbon\Carbon::parse($row['join_date'])->format('Y-m-d') : null,
            ]);
      }

      public function rules(): array {
            return [
                      'account_name' => 'required|string',
                      'first_name' => 'required|string',
                      'last_name' => 'required|string',
                      'email' => 'nullable|email',
                      'birthdate' => 'nullable|date',
                      'join_date' => 'nullable|date',
                  // add more rules as you like
            ];
      }
}
